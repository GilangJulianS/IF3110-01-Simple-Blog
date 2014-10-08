<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="Deskripsi Blog">
<meta name="author" content="Judul Blog">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="omfgitsasalmon">
<meta name="twitter:title" content="Simple Blog">
<meta name="twitter:description" content="Deskripsi Blog">
<meta name="twitter:creator" content="Simple Blog">
<meta name="twitter:image:src" content="{{! TODO: ADD GRAVATAR URL HERE }}">

<meta property="og:type" content="article">
<meta property="og:title" content="Simple Blog">
<meta property="og:description" content="Deskripsi Blog">
<meta property="og:image" content="{{! TODO: ADD GRAVATAR URL HERE }}">
<meta property="og:site_name" content="Simple Blog">

<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php 
    if(isset($_POST['post-id']))
        $isEdit = true;
    else
        $isEdit = false;
    if($isEdit)
        echo "<title>Simple Blog | Edit Post</title>";
    else
        echo "<title>Simple Blog | Tambah Post</title>";
?>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
</nav>

<?php 
    if($isEdit){
        $con = mysqli_connect("localhost", "root", "", "wbd");

        if(mysqli_connect_errno()){
            echo "Failed to connect database";
        }

        $query = "SELECT * FROM post WHERE id = " . $_POST['post-id'];
        $result = mysqli_query($con, $query) or die(mysql_error());
        $row = mysqli_fetch_assoc($result);
    }
?>

<article class="art simple post">
    
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <?php 
                if($isEdit)
                    echo "<h2>Edit Post</h2>";
                else
                    echo "<h2>Tambah Post</h2>";
            ?>
            

            <div id="contact-area">
                <form method="post" action=
                    <?php 
                        if($isEdit)
                            echo "'update.php'";
                        else
                            echo "'insert.php'";
                    ?>>
                    
                    <label for="Judul">Judul:</label>
                    <input type="text" name="title" id="Judul"
                        <?php 
                            if($isEdit)
                                echo "value='".$row['title']."'";
                        ?>>

                    <label for="Tanggal">Tanggal:</label>
                    <input type="text" name="date" id="Tanggal"
                        <?php 
                            if($isEdit)
                                echo "value='".$row['date']."'";
                        ?>>

                    <label for="Konten">Konten:</label><br>
                    <textarea name="content" rows="20" cols="20" id="Konten"><?php 
                        if($isEdit)
                            echo $row['content']; ?>
                    </textarea>
                    <?php 
                        if($isEdit){
                            echo "<input type='hidden' name='post-id' value=".$_POST['post-id'].">";
                        }
                    ?>

                    <input type="submit" name="submit" value="Simpan" class="submit-button">
                </form>
            </div>
        </div>
    </div>

</article>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        Asisten IF3110 /
        <a class="rss-link" href="#rss">RSS</a> /
        <br>
        <a class="twitter-link" href="http://twitter.com/YoGiiSinaga">Yogi</a> /
        <a class="twitter-link" href="http://twitter.com/sonnylazuardi">Sonny</a> /
        <a class="twitter-link" href="http://twitter.com/fathanpranaya">Fathan</a> /
        <br>
        <a class="twitter-link" href="#">Renusa</a> /
        <a class="twitter-link" href="#">Kelvin</a> /
        <a class="twitter-link" href="#">Yanuar</a> /
        
    </aside>
</footer>

</div>

<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>

</body>
</html>