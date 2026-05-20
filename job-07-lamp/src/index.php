<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Test Stack LAMP - Job 07</title>
    <style>
        body { font-family: sans-serif; background: #f4f4f9; padding: 40px; color: #333; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); margin-bottom: 20px; }
        .success { color: #2e7d32; font-weight: bold; }
        .error { color: #c62828; font-weight: bold; }
    </style>
</head>
<body>

    <div class="card">
        <h1>🚀 Statut de la connexion MySQL</h1>
        <?php
        $host = 'db';
        $user = 'dev';
        $pass = 'mon_password_dev_secure';
        $dbname = 'lamp_demo';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
            echo "<p class='success'>✅ Connexion réussie à la base de données '$dbname' sur le conteneur MySQL !</p>";
        } catch (PDOException $e) {
            echo "<p class='error'>❌ Erreur de connexion : " . $e->getMessage() . "</p>";
        }
        ?>
    </div>

    <div class="card">
        <h2>ℹ️ Configuration PHP détaillée (phpinfo)</h2>
        <?php phpinfo(); ?>
    </div>

</body>
</html>