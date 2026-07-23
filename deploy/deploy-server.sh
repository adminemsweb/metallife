#!/usr/bin/env bash
set -Eeuo pipefail

export PATH="/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin"

exec 9>/var/lock/metallife-deploy.lock
if ! flock -n 9; then
  echo "Another Metal Life deployment is already running."
  exit 1
fi

cd /opt/metallife

expected_remote="https://github.com/adminemsweb/metallife.git"
actual_remote="$(git remote get-url origin)"
if [[ "$actual_remote" != "$expected_remote" ]]; then
  echo "Unexpected Git remote: $actual_remote"
  exit 1
fi

git fetch --prune origin main
git checkout main
git merge --ff-only origin/main

commit="$(git rev-parse --short=12 HEAD)"
image="metallife:${commit}"

echo "Building $image"
docker build -t "$image" .

echo "Updating only the metallife stack"
METALLIFE_IMAGE="$image" docker stack deploy \
  --resolve-image never \
  -c deploy/stack.yml \
  metallife

for attempt in $(seq 1 60); do
  replicas="$(docker service ls --filter name=metallife_web --format '{{.Replicas}}')"
  current_image="$(docker service inspect metallife_web --format '{{.Spec.TaskTemplate.ContainerSpec.Image}}')"

  if [[ "$replicas" == "1/1" && "$current_image" == "$image" ]]; then
    curl --fail --silent --show-error \
      --resolve metallife.com.br:443:127.0.0.1 \
      https://metallife.com.br/ \
      >/dev/null
    echo "Metal Life deployed successfully at commit $commit."
    exit 0
  fi

  sleep 3
done

echo "Deployment did not become healthy in time."
docker service ps metallife_web --no-trunc
exit 1
