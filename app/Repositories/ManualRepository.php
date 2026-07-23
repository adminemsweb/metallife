<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Database;
use PDO;

final class ManualRepository
{
    private ?PDO $pdo;
    /** @var array<string,mixed> */
    private array $fallback;

    public function __construct()
    {
        $this->pdo = Database::connect();
        $this->fallback = require dirname(__DIR__) . '/Data/manual.php';
    }

    /**
     * @return array<string,mixed>
     */
    public function all(): array
    {
        if (!$this->pdo) {
            return $this->fallback;
        }

        return [
            'brand' => $this->brand(),
            'sections' => $this->table('manual_sections'),
            'pillars' => $this->table('brand_pillars'),
            'colors' => $this->table('brand_colors'),
            'logos' => $this->table('logo_variations'),
            'voice' => $this->fallback['voice'],
            'applications' => array_column($this->table('brand_applications'), 'title'),
        ];
    }

    /**
     * @return array<string,string>
     */
    private function brand(): array
    {
        $rows = $this->table('brand_settings');
        $brand = [];
        foreach ($rows as $row) {
            $brand[$row['setting_key']] = $row['setting_value'];
        }
        return $brand ?: $this->fallback['brand'];
    }

    /**
     * @return array<int,array<string,mixed>>
     */
    private function table(string $table): array
    {
        $statement = $this->pdo?->query("SELECT * FROM {$table} ORDER BY sort_order ASC, id ASC");
        return $statement ? $statement->fetchAll() : [];
    }
}
