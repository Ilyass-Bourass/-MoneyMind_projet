<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alerte Dépense</title>
</head>
<body>
    <h1>Bonjour {{ $nomUtilisateur }},</h1>
    <p>Vous avez atteint 50% de votre budget avec un montant restant de <strong>{{ $montant }}dh</strong>.</p>
    <p>Veuillez surveiller vos dépenses pour éviter des surprises.</p>
    <p>Cordialement, <br> L'équipe de gestion de monemind</p>
</body>
</html>
