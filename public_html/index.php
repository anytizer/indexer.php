<!DOCTYPE html>
<html>
<title>List of web services</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css"> 
</head>
<body>
	<div class="w3-container w3-teal">
		<h1>Hosted Applications</h1>
	</div>
    
    <table class="w3-table w3-bordered w3-striped w3-border w3-hoverable">
        <thead class="w3-black">
            <tr>
                <td>S.N.</td>
                <td>Icon</td>
                <td>GIT?</td>
                <td>Application</td>
                <td>Info</td>
            </tr>
        </thead>
        <tbody>
<?php
$path = "../..";
$dirs = scandir($path);
#print_r($dirs);

$dirs = array_diff($dirs, [".", "..", ".git"]);
$sn = 0;

foreach($dirs as $dir)
{	
	if(is_dir($path.'/'.$dir))
	{
		$git = is_dir($path.'/'.$dir.'/.git')?"&nbsp;":"<span style='color:red;'>x</span>";
		$public_html = is_file("{$path}/{$dir}/public_html/index.php");
        $class = $public_html?"w3-teal":"w3-red";
        
        $infofile = "{$path}/{$dir}/info.txt";
        $info = file_exists($infofile)?file_get_contents($infofile):"";
?>
            <tr>
                <td><?php echo ++$sn; ?></td>
                <td>Icon</td>
                <td><?php echo $git; ?></td>
                <td class="<?php echo $class; ?>">
                    <?php echo "<a href='../../{$dir}/public_html/'>{$dir}</a>"; ?>
                </td>
                <td><?php echo $info; ?></td>
            </tr>
<?php
	} // if
} // foreach
?>
        </tbody>
    </table>
</body>
 </html>
