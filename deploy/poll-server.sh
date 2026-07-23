#!/usr/bin/env bash
set -Eeuo pipefail

export PATH="/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin"

exec 8>/var/lock/metallife-poll.lock
if ! flock -n 8; then
  exit 0
fi

cd /opt/metallife
git fetch --quiet origin main

local_commit="$(git rev-parse HEAD)"
remote_commit="$(git rev-parse origin/main)"

if [[ "$local_commit" == "$remote_commit" ]]; then
  exit 0
fi

echo "New Metal Life commit detected: $remote_commit"
/usr/local/sbin/deploy-metallife
