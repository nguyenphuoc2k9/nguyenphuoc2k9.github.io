<style>
    *{
    margin: 0;
    padding: 0;
}
body{
    background-image: linear-gradient(to left, #e4e7eb, #dfe6ed, #dae5ef, #d4e4f1, #cde4f2);
}
/* header */
.header{
    width: 100%;
}
.header-box{
    height: 80px;
    display: flex;
    flex-direction: column;
}
.head-logo{
    width: 100%;
    display: flex;
    background-color: rgb(68, 68, 68);
    justify-content: space-around;
    align-items: center;
}
.head-logo form{
    width: 55%;
    margin-left: 10px;
    overflow: hidden;
    border-radius: 10px;
    background-color: #fff;
}
.head-logo input{
    width: 80%;
    padding: 1%;
    border: none;
}
.head-logo form button{
    width: 5%;
    padding: 1%;
    margin-left: 12.54%;
    cursor: pointer;
    background-color: #000;
    color: #fff;
    font-size: larger;
}
.head-logo input:focus-visible{
    outline: none;
}
.head-btn{
    width: 15%;
    display: flex;
    justify-content: center;
}
.head-logo .head-btn button{
    border: #fff solid 1px;
    border-radius: 5px;
    color: #fff;
    background-color:rgb(68, 68, 68);
    font-size: larger;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    padding: 4%;
    width: 50%;
    cursor: pointer;
}
.head-btn button a{
    color: #fff;
    text-decoration: none;
}
.head-logo .head-btn button:nth-child(2){
    background-color: rgb(78, 125, 255);
    border: none;
    margin-left: 10px;
}
.head-con{
    padding: 20px;
    background-color: rgb(31, 31, 31);
    display: flex;
    justify-content: space-around;
    align-items: center;
    z-index: 99;
}
.logo-image{
    width: 10%;
}
.header-box img{
    width: 100%;
}
.header-box .head-text{
    font-size: 20px;
    position: relative;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    color: #fff;
    text-decoration: none;
    letter-spacing: 2px;
    transition: all .5s cubic-bezier(0.86, 0, 0.07, 1);
}
.header-box p{
    font-size: 20px;
    position: relative;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    color: #fff;
    text-decoration: none;
    letter-spacing: 2px;
    transition: all .5s cubic-bezier(0.86, 0, 0.07, 1);
}
.header-box p:hover{
    color: cyan;
}
.header-box .head-text i{
    margin-right: 10px;
}
.header-box .head-text::after{
    top: 30px;
    bottom: 0;
    content: "";
    display: block;
    justify-content: center;
    align-items: center;
    transition: all .4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    position: absolute;
    width: 0;
    height: 3px;
    background: #fff;
}
.header-con .head-text:hover:after{
    width: 100%;
}
/* footer */

.footer{
    overflow: hidden;
    position: relative;
    bottom: 0;
    width: 100%;
    background-color: rgb(39, 39, 39);
    color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.footer-title{
    width: 100%;
    padding: 10px;
    margin-top: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.footer-title h1{
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: larger;
}
.footer-icon{
    width: 100%;
    padding: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.footer-icon i{
    padding-left: 20px;
    font-size: 30px;
    transition: 0.5s
}
.footer-info{
    padding: 30px;
    width: 50%;
    display: flex;
    justify-content: space-around;
}
.info-card{
    padding: 30px;
    font-size: large;
    font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif
}
.footer-icon i:hover{
    color: aqua;
}
/* sidenav */
.sidenav{
    position: fixed;
    z-index: 99;
}
.sidenav-box{
    z-index: 99;   
    background-color: rgba(119, 133, 255);
    position: fixed;
    display: flex;
    width: 20%;
    left: 0%;
    height: 100%;
    margin-top: -5.1%;
    flex-direction: column;
    transition: 0.5s ease ;
}
.sidenav-box .option{
    display: flex;
    height: 40%;
    margin: 10% 0;
    flex-direction: column;
    justify-content: space-around;
}
.sidenav-box .option a{
    text-decoration: none;
    padding: 10%;
    font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    font-size: larger;
    transition: .5s cubic-bezier(0.075, 0.82, 0.165, 1);
    color: #fff;
}
.sidenav-box .option a:hover{
    border-left: rgb(0, 202, 169) solid 15px;
    background-color: #b3d6ffe3;
}
.sidenav-box hr{
    border-radius: 10px;
    width: 80%;
    margin: 0 9%;
    border: rgb(255, 255, 255) solid 3px;
}
.sidenav-box .userinfo{
    display: flex;
    margin: 10%;
    flex-direction: column;
}
.userinfo h1{
    font-size: larger;
    margin-bottom: 10%;
    color: #fff;
    gap: 10px;
    display: flex;
    align-items: center;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
.sidenav-box .userinfo button{
    border: none;
    border-radius: 10px;
    background-color:rgb(0, 114, 129);
    color: #fff;
    width: 50%;
    cursor: pointer;
    padding: 5%;
}
.userinfo img{
    width: 50px;
    border-radius: 50%;
    height: 50px;
}
.userinfo button a{
    text-decoration:none;
    color:#fff;
}
.sidenav-close-btn{
    left: 21%;
    margin-top: 1%;
    display: flex;
    transition: ease 0.5s;
    justify-content: center;
    align-items: center;
    position: fixed;
    z-index: 99;
}
.sidenav-close-btn button{
    border-radius: 10px;
    border: none;
    background-color: rgba(119, 133, 255);
    width: 50px;
    cursor: pointer;
    height: 50px;
    z-index: 99;
}
.sidenav-close-btn i{
    color: #fff;
    font-size: larger;
}
.pop-up{
    position:absolute;
    display: none;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    background-color: rgba(119, 133, 255);
    width: 410px;
    padding: 30px;
    box-shadow: 0 0 8px rgb(0, 0, 0,0.1);
}
.pop-box{
    position: relative;
}
.pop-box .closepop{
    position: absolute;
    right: -2%;
    background: none;
    border: none;
    top: -5%;
    cursor: pointer;
    color: #fff;
    font-size: large;
}
.pop-box h1{
    text-align: center;
    color: #fff;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
.pop-box form{
    position: relative;
    margin-top: 21px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.pop-box form .pop-card {
    height: 50px;
    display: flex;
    position: relative;
    flex-direction: column;
    width: 100%;

}
.pop-box form .pop-card label {
    font-size: large;
    color: #fff;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
.pop-box form .pop-card input {
    height: 100%;
    width: 100%;
    padding-left: 10px;
    font-size:17px;
    border: 1px solid lightgray;
}
.pop-box form .pop-btn{
    width: 100%;
    position: relative;
}
.pop-btn button{
    width: 103%;
    padding: 10px;
    background-color: rgb(0, 17, 112);
    border: none;
    border-radius: 5px;
    font-size: larger;
    color: #fff;
    cursor: pointer;
}
.profile{
    margin: 3% auto;
    width: 100%;
}
.profile-box{
    display: flex;
    margin: auto;
    flex-direction: column;
    align-items: center;
    width: 70%;
    border-radius: 10px;
    background-color: rgb(247, 247, 247);
}
.profile-img img{
    width: 100px;
    height: 100px;
    border-radius: 50%;
}
.profile-img{
    display: flex;
    flex-direction: column;
    align-items: center;
    font-size: larger;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
.profile-info{
    display: flex;
    align-items: center;
    flex-direction: column;
}
.profile-info h1{
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    margin: 3% 0;
}
.profile-info .card{
    display: flex;
    align-items: center;
    gap: 7px;
}
.profile-info h2{
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
.profile-info .card button{
    border: none;
    background: none;
    font-size: medium;
    cursor: pointer;
    transition: .5s;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
.profile-info .card button:hover{
    text-decoration: underline;
}
.card-btn button{
    background-color: rgba(119, 133, 255);
    color: #fff;
    padding: 10px;
    font-size: larger;
    border: none;
    cursor: pointer;
    border-radius: 10px;
}
.profile-info button i{
    font-size: small;
}
#file{
    border: none;
}

</style>