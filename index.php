<?php
$navLists = [
    'main' => ['home' => 'Home Page', 'study' => 'Study', 'research' => 'Research', 'sem' => 'Seminars'],
    'study' => ['ug' => 'Undergraduate', 'pg' => 'Post Graduate', 'res' => 'Research Degrees'],
    'research' => ['rStaff' => 'Staff','rProj' => 'Research Projects','rStu' => 'Research Students'],
    'sem' => ['current' => 'Current Year','prev' => 'Previous Years'],
    'ug' => ['cs' => 'Computer Science','ds' => 'Data Science'],
    'pg' => ['swe' => 'Software Engineering','cf' => 'Computer Forensics'],
    'cs' => ['in' => 'Introduction to Programming','dt' => 'Database Technology']
];

$selected = $_GET['linkSelected'] ?? 'home';

function findPathToSelected($current, $selected, $navLists, $path = []) {
    $path[] = $current;

    if (!isset($navLists[$current])) return [];

    foreach ($navLists[$current] as $key => $label) {
        if ($key === $selected) {
            return array_merge($path, [$key]);
        }

        if (isset($navLists[$key])) {
            $result = findPathToSelected($key, $selected, $navLists, $path);
            if (!empty($result)) return $result;
        }
    }

    return [];
}

function buildMenu($current, $navLists, $selectedPath) {
    if (!isset($navLists[$current])) return;

    echo "<ul>";
    foreach ($navLists[$current] as $key => $label) {
        echo "<li><a href='?linkSelected=$key'>$label</a>";
        if (in_array($key, $selectedPath) && isset($navLists[$key])) {
            buildMenu($key, $navLists, $selectedPath);
        }
        echo "</li>";
    }
    echo "</ul>";
}

function getLabel($key, $navLists) {
    foreach ($navLists as $group) {
        if (isset($group[$key])) return $group[$key];
    }
    return 'Home Page';
}

$selectedPath = findPathToSelected('main', $selected, $navLists);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Web Programming using PHP - Dynamic NAV Single Point of Entry</title>
</head>
<body>
    <h1>Web Programming using PHP </h1>
    <h2>Coursework 2 - Task 1 - Dynamic NAV using a URL parameter</h2>

    <?php buildMenu('main', $navLists, $selectedPath); ?>

    <p><?= htmlspecialchars(getLabel($selected, $navLists)) ?> was selected from the menu</p>
</body>
</html>

