<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Le Repaire des Moustaches - Stack Docker Fullstack</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #F9F6F0; color: #333; margin: 0; padding: 40px; }
        .container { max-width: 1000px; margin: 0 auto; }
        header { text-align: center; margin-bottom: 40px; border-bottom: 3px dashed #1D998B; padding-bottom: 20px; }
        h1 { color: #1D998B; margin: 0; font-size: 2.5em; text-transform: uppercase; letter-spacing: 2px; }
        .subtitle { color: #E9A09B; font-weight: bold; font-size: 1.2em; margin-top: 5px; }
        .status-box { background: white; padding: 15px; border-radius: 8px; border-left: 5px solid #1D998B; box-shadow: 0 2px 5px rgba(0,0,0,0.05); margin-bottom: 30px; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; }
        .card { background: white; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); overflow: hidden; border: 1px solid #eee; transition: transform 0.2s; }
        .card:hover { transform: translateY(-5px); }
        .card-header { background: #1D998B; color: white; padding: 15px; font-size: 1.3em; font-weight: bold; display: flex; justify-content: space-between; align-items: center; }
        .badge { background: #F4D160; color: #333; padding: 4px 10px; border-radius: 20px; font-size: 0.7em; text-transform: uppercase; font-weight: bold; }
        .badge.adopté { background: #E9A09B; color: white; }
        .badge.famille_accueil { background: #6c757d; color: white; }
        .card-body { padding: 20px; }
        .breed { font-style: italic; color: #666; margin-bottom: 10px; }
        .age { font-weight: bold; color: #333; margin-bottom: 15px; }
        .desc { color: #555; line-height: 1.5; }
    </style>
</head>
<body>

<div class="container">
    <header>
        <h1>🐈 Le Repaire des Moustaches 🐈</h1>
        <div class="subtitle">Environnement de Développement Local (Job 08)</div>
    </header>

    <div class="status-box">
        <h3>🔌 Statut de la Connexion BDD :</h3>
        <?php
        // Connexion via les variables injectées par Docker
        $host = 'db'; // Nom du service MySQL dans le docker-compose
        $dbname = 'repaire_des_moustaches';
        $user = 'chef_moustaches';
        $pass = 'miaou_secure_password';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<p style='color: #2e7d32; font-weight: bold; margin: 0;'>✅ Succès : Connecté à la base MySQL ! Le script 'init.sql' a injecté les données avec succès.</p>";
        } catch (PDOException $e) {
            echo "<p style='color: #c62828; font-weight: bold; margin: 0;'>❌ Erreur de connexion : " . $e->getMessage() . "</p>";
            exit;
        }
        ?>
    </div>

    <h2>🐾 Nos pensionnaires à l'adoption (Données de la BDD) :</h2>
    <div class="grid">
        <?php
        // Récupération des chats insérés par le script SQL
        $stmt = $pdo->query("SELECT * FROM cats");
        while ($cat = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='card'>";
            echo "  <div class='card-header'>";
            echo "    <span>" . htmlspecialchars($cat['name']) . "</span>";
            echo "    <span class='badge " . htmlspecialchars($cat['status']) . "'>" . str_replace('_', ' ', htmlspecialchars($cat['status'])) . "</span>";
            echo "  </div>";
            echo "  <div class='card-body'>";
            echo "    <div class='breed'><b>Race :</b> " . htmlspecialchars($cat['breed']) . "</div>";
            echo "    <div class='age'><b>Âge :</b> " . htmlspecialchars($cat['age_months']) . " mois</div>";
            echo "    <div class='desc'>" . htmlspecialchars($cat['description']) . "</div>";
            echo "  </div>";
            echo "</div>";
        }
        ?>
    </div>
</div>

</body>
</html>