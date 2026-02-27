<?php
require_once __DIR__ . '/../config/config.php';

class StudentService {
    private static $baseUrl = API_BASE_URL;

    // Récupérer tous les étudiants
    public static function getAllStudents() {
        $url = self::$baseUrl . '/students';
        $response = file_get_contents($url);
        return json_decode($response, true);
    }

    // Récupérer un étudiant par ID
    public static function getStudentById($id) {
        $url = self::$baseUrl . '/students/' . $id;
        $response = file_get_contents($url);
        return json_decode($response, true);
    }

    // Ajouter un étudiant
    public static function addStudent($name, $age) {
        $url = self::$baseUrl . '/students';
        $data = ['name' => $name, 'age' => $age];

        $options = [
            'http' => [
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data),
            ],
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return json_decode($response, true);
    }

    // Mettre à jour un étudiant
    public static function updateStudent($id, $name, $age) {
        $url = self::$baseUrl . '/students/' . $id;
        $data = ['name' => $name, 'age' => $age];

        $options = [
            'http' => [
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'PUT',
                'content' => json_encode($data),
            ],
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return json_decode($response, true);
    }

    // Supprimer un étudiant
    public static function deleteStudent($id) {
        $url = self::$baseUrl . '/students/' . $id;

        $options = [
            'http' => [
                'method'  => 'DELETE',
            ],
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return json_decode($response, true);
    }
}
?>

