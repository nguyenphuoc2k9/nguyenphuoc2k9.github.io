<?php
    $query2 = mysqli_query($con, "SELECT * FROM post WHERE owner = '$id'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pROFILE</title>
    <link rel="stylesheet" href="./style.css">
    <script src="https://kit.fontawesome.com/1410425ca1.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Header -->

    <div class="header">
        <div class="header-box">
            <div class="head-logo">
                <a  class ="logo-image" href="#"><img src="../d.png" alt="logo"></a>
                <?php
                    if(isset($_POST['search-btn'])){
                        $_SESSION['k'] = $_POST['k'];
                    } else {
                        $_SESSION['k'] = null;
                    }
                ?>
                <form action = "../search_result/search.php?k=<?php echo $_SESSION['k']?>">
                    <input type="text" name = "k" placeholder="Enter the things that you want to search">
                    <button type="submit" name="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <div class="head-btn" id="head-btn">
                    
                </div>
            </div>
            <div class="head-con">
                <a class="head-text" href="../Home_/home.php"><i class="fa-solid fa-house"></i>Home</a>
                <a class="head-text" href="../News/new.php"><i class="fa-solid fa-newspaper"></i>News</a>
                <a href="../Create/create.php" class="head-text"><i class="fa-solid fa-plus"></i>Create</a>
            </div>
        </div>
    </div>
    <!--Sidenav-->

    <div class="sidenav">
        <div class="sidenav-box" id="sidenav-box">
        <div class="option">
                <a href="../Home_/home.php">Main news</a>
                <a href="../News/new.php">Personal news</a>
            </div>
            <hr/>
            <div class="userinfo">
                <h1><a href="../profile/profile.php"><img src="<?php echo $_SESSION['img']?>"></a> <?php echo $_SESSION['username']; ?></h1>
                <button id="log-out"> <a href = "../Login/logout.php">Log Out</a></button>
            </div>
        </div>
        <div class="sidenav-close-btn" id="close-">
            <button id="close"><i class="fa-solid fa-bars"></i></button>
        </div>
    </div>
    <div class="profile">
        <div class="profile-box">
        <?php
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $gmail = $row['gmail'];
                        $hobby = $row['hobby'];
                        $pn = $row['Phone_number'];
                        if($row['img']==null){
                            $img2 = "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn4.iconfinder.com%2Fdata%2Ficons%2Fgray-user-management%2F512%2Frounded-512.png&f=1&nofb=1";
                        } else {
                            $img2 = "../user upload/" . $row['img'];
                        }
                        $username = $row['username'];
                        
            ?>
            <div class="profile-img">
                <img src="<?php echo $img2;?>">
                <h1><?php echo $row['username'];?></h1>
            </div>
            <div class="profile-info">
                
                    
                        
                        
                        <h1>About</h1>
                    <div class="card">
                        <h1>Gmail :</h1>
                        <h2><?php echo $gmail?></h2>
                    </div>
                    <div class="card">
                        <h1>Hobby :</h1>
                        <h2><?php echo $hobby?></h2>
                    </div>
                    <div class="card">
                        <h1>Phone number:</h1>
                        <h2><?php echo $pn;?></h2>
                    </div>
                    <?php }
                        mysqli_data_seek($result, 0);
                    ?>
            </div>
            <div class="profile-new">
            <hr>
                <div class="profile-title">
                    <h1><?php echo $_SESSION['username'];?>'s Posts</h1>
                </div>
                <div class="new-box">
                    <?php
                        while($row2 = mysqli_fetch_assoc($query2)){
                            $title = $row2['title'];
                            $desc = $row2['descritpion'];
                            $id = $row2['id'];
                            $img = "../Create/uploads/" . $row2['imgid'];
                        
                    ?>
                    <div class="news">
                        <div class="info">
                            <div class="owner">
                                <img src="<?php echo $img2;?>">
                                <h1><?php echo $username?></h1>
                            </div>
                            <h1><?php echo $title?></h1>
                            <p class="class_desc"><?php echo $desc?></p>
                            <div class="news-btn">
                            <a href="../detail/detail.php?id=<?php echo $id?>&&tt=pe-post"><span></span><p class="text-read-more" >Read more</p></a>
                            </div>
                        </div>
                        <img src="<?php echo $img?>" alt="img">
                    </div>
                    <?php
                        }
                    ?>
                    <!-- <div class="news">
                        <div class="info">
                            <div class="owner">
                                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn4.iconfinder.com%2Fdata%2Ficons%2Fgray-user-management%2F512%2Frounded-512.png&f=1&nofb=1">
                                <h1>LOL</h1>
                                <a href="./delete-pe-post.php?id="><i class="fa-solid fa-trash"></i></a>
                            </div>
                            <h1>Title</h1>
                            <p class="class_desc"> toàn khđược trên đường đi học về, cũng "màu nâu đậm, hình vuông, bên trong có chứa nhiều giấy tờ quan trọng và một số tiền lớn".</p>
                            <div class="news-btn">
                               <button><span></span><p class="text-read-more">Read more</p></button>
                            </div>
                        </div>
                        <img src="../dảk image.png" alt="img">
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="footer" id="footer">
        <div class="footer-title">
            <h1>You can contact us on</h1>
        </div>
        <div class="footer-icon">
            <a href="https://www.facebook.com/Teenager-Blog-109466681887056"><i class="fa-brands fa-facebook-square"></i></a>
            <a href="https://www.instagram.com/teenblog2009/"><i class="fa-brands fa-instagram-square"></i></a>
            <a href="https://www.youtube.com/channel/UCC_Q2OmoQP0vEwVF3nr87Tg"><i class="fa-brands fa-youtube-square"></i></a>
            <a href="https://web.telegram.org/z/#777000"><i class="fa-brands fa-telegram"></i></a>
        </div>
        <div class="footer-info">
          <div class="info-card">
              <h5>Email:</h5>
              <p>Phuochuunguyen2009@gmail.com</p>
          </div>
          <div class="info-card">
              <h5>Phone number:</h5>
              <p>0905332540</p>
          </div>
          <div class="info-card">
              <h5>Facebook:</h5>
              <p>nguyễn Phước</p>
          </div>  
        </div>
    </div>
    <script src="./app.js"></script>
</body>
</html>