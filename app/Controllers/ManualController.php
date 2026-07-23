<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Repositories\ManualRepository;

final class ManualController
{
    private ManualRepository $manuals;

    public function __construct()
    {
        $this->manuals = new ManualRepository();
    }

    public function page(string $template, string $pageTitle): void
    {
        View::render($template, [
            'manual' => $this->manuals->all(),
            'pageTitle' => $pageTitle,
        ]);
    }

    public function contact(): void
    {
        $fields = [
            'name' => trim((string) ($_POST['name'] ?? '')),
            'company' => trim((string) ($_POST['company'] ?? '')),
            'email' => trim((string) ($_POST['email'] ?? '')),
            'phone' => trim((string) ($_POST['phone'] ?? '')),
            'interest' => trim((string) ($_POST['interest'] ?? '')),
            'message' => trim((string) ($_POST['message'] ?? '')),
        ];

        $isBot = trim((string) ($_POST['website'] ?? '')) !== '';
        $isValid = !$isBot
            && $fields['name'] !== ''
            && $fields['company'] !== ''
            && filter_var($fields['email'], FILTER_VALIDATE_EMAIL)
            && $fields['phone'] !== ''
            && $fields['interest'] !== ''
            && $fields['message'] !== '';

        if (!$isValid) {
            http_response_code(422);
            View::render('contact', [
                'manual' => $this->manuals->all(),
                'pageTitle' => 'Contato',
                'formStatus' => 'error',
                'formData' => $fields,
            ]);
            return;
        }

        $storageDirectory = dirname(__DIR__, 2) . '/storage';
        if (!is_dir($storageDirectory)) {
            mkdir($storageDirectory, 0775, true);
        }

        $file = fopen($storageDirectory . '/contact-requests.csv', 'ab');
        if ($file !== false) {
            flock($file, LOCK_EX);
            if (ftell($file) === 0) {
                fputcsv($file, ['created_at', 'name', 'company', 'email', 'phone', 'interest', 'message'], ',', '"', '');
            }
            fputcsv($file, [date(DATE_ATOM), ...array_values($fields)], ',', '"', '');
            flock($file, LOCK_UN);
            fclose($file);
        }

        View::render('contact', [
            'manual' => $this->manuals->all(),
            'pageTitle' => 'Contato',
            'formStatus' => 'success',
            'formData' => [],
        ]);
    }
}
