<?php
session_start();

try {
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=inscriptions;charset=utf8mb4", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
