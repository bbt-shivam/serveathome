<head>
    <title>serveathome</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/')?>fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url('assets/')?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/')?>css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="<?= base_url('assets/')?>fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="<?= base_url('assets/')?>css/aos.css">
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/rangeslider.css">

    <link rel="stylesheet" href="<?= base_url('assets/')?>css/style.css">

    <link rel="stylesheet" href="<?= base_url('assets/')?>css/jquery.auto-complete.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?=base_url('assets/provider/')?>fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <link href="<?=base_url('assets/provider/')?>fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />


    <!-- ilnk of the meta for the login / signup with google api ... -->
    <meta name="google-signin-client_id" content="819892499226-a49eh93q2p5d8tk8io5a1di6h75ap01d.apps.googleusercontent.com">


 <!--    <link href="<?=base_url('assets/provider/')?>css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" /> -->
    
<style type="text/css">
  .fa-rotate-45 {
    -webkit-transform: rotate(330deg) !important;
    -moz-transform: rotate(330deg) !important;
    -ms-transform: rotate(330deg) !important;
    -o-transform: rotate(330deg) !important;
    transform: rotate(330deg) !important;
  }
  .logo-icon{
      font-size: 30px !important;
      padding-right: 8px;
      float: left;
  }
   .printable { display: none; }
  @media print{
    .noprint{ display: none;}
    .printable { display: block; }
  }

    .cart-footer {
       position: fixed;
       left: 0;
       bottom: 0;
       width: 100%;
       border: 1px solid #f2f2f2;
       background-color: white;
     /*  color: white;*/
       text-align: center;
    }
    .square_btn{
        display: inline-block;
        padding: 0.5em 1em;
        margin-bottom: 10px;
        text-decoration: none;
        border-radius: 6px;
        color: #FFF;
        background-image: -webkit-linear-gradient(#6795fd 0%, #67ceff 100%);
        background-image: linear-gradient(#6795fd 0%, #67ceff 100%);
        transition: .4s;
        float: right;
        margin-top: 10px;
        margin-right: 20px;
    }

    .square_btn:hover{
        background-image: -webkit-linear-gradient(#6795fd 0%, #67ceff 70%);
        background-image: linear-gradient(#6795fd 0%, #67ceff 70%);
        color: white;
    }

    .count{
        border: 1px solid white;
        border-radius: 4px;
        padding: 5px;
    }

    .editLabel {
      float: right; 
      padding-right: 10px; 
      font-size: 12px;
      cursor: pointer;
      color: blue;
      font-weight: bold;
    }

    .removeLable {
      cursor: pointer;
    }

    .profile-s-list {
        font-size: 15px; 
        padding: 10px;
        cursor: pointer;
    }

    .statistics{
      position:relative;
      display: flex;
      align-items: center;
      padding:30px 0 30px;
  }
.statistics:before{
    position:absolute;
    content:''; 
    background: #0099ff;
    height:100%;
    width:100%;
    top:0;
    left:0;
}
/* single-ststistics-box */
.single-ststistics-box {
    text-align: center;
}
/* single-ststistics-box */
.statistics-content{
    display: flex;
    justify-content: center;
    color:#ffffff;
    font-size:50px;
    font-weight: bold;
}
.statistics-content span {
    margin-left: 5px;
}
.single-statistics-box h3{
    color:#fff;
    font-size:24px;
    text-transform:capitalize;
}
   
.showQty{
     position: absolute;
      right: 50px;
     /* float: right; */
      border: 1px solid blue;
      top: 20px;
      width: 30px;
      height: 30px;
      border-radius: 0;
      display: inline-block;
      padding-bottom: 5px;
       padding-left: 10px;
        padding-top: 5px;
      background: rgba(0, 0, 0, 0.03);
      -webkit-transition: .3s all ease;
      -o-transition: .3s all ease;
      transition: .3s all ease;
      font-size: 12px;
}   
.removeQty{
    position: absolute;
      right: 20px;
     /* float: right; */
     cursor: pointer;
      border: 1px solid blue;
      top: 20px;
      width: 30px;
      height: 30px;
      border-radius: 0;
      display: inline-block;
      background: rgba(0, 0, 0, 0.03);
      -webkit-transition: .3s all ease;
      -o-transition: .3s all ease;
      transition: .3s all ease;
      font-size: 12px;
}
.serviceHeandig{
    padding-top: 10px; 
    padding-bottom: 0; 
    padding-left: 10px; 
    font-size: 18px;
}

.spinner {
  width: 40px;
  height: 40px;
  background-color: #fafffe;
  position: absolute;
  top: 48%;
  left: 48%;
  -webkit-animation: sk-rotateplane 1.2s infinite ease-in-out;
  animation: sk-rotateplane 1.2s infinite ease-in-out;
}

@-webkit-keyframes sk-rotateplane {
  0% { -webkit-transform: perspective(120px) }
  50% { -webkit-transform: perspective(120px) rotateY(180deg) }
  100% { -webkit-transform: perspective(120px) rotateY(180deg)  rotateX(180deg) }
}

@keyframes sk-rotateplane {
  0% { 
    transform: perspective(120px) rotateX(0deg) rotateY(0deg);
    -webkit-transform: perspective(120px) rotateX(0deg) rotateY(0deg) 
  } 50% { 
    transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg);
    -webkit-transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg) 
  } 100% { 
    transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
    -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
  }
}

  .spinner-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #477bff;
    z-index: 999999;
  }

    
    .googleTranslate{
      position: absolute;
      display: block;

      top: 0;
      left: 0;
      

    }


    @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');


.cross {
    padding: 20px;
    color:  #f50202;
    cursor: pointer;
    font-size: 23px
}

.cross i {
    margin-top: -5px;
    cursor: pointer
}

.comment-box {
    padding: 5px
}

.comment-area textarea {
    resize: none;
    border: 1px solid #0066ff;
}

.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #0066ff;
    outline: 0;
    box-shadow: 0 0 0 1px rgb(0, 102, 255) !important
}

.send {
    color: #fff;
    background-color: #0066ff;
    border-color:#0066ff;
}

.send:hover {
    color: #fff;
    background-color:#0066ff;
    border-color: #0066ff
}

.rating {
    display: inline-flex;
    margin-top: -10px;
    flex-direction: row-reverse
}

.rating>input {
    display: none
}

.rating>label {
    position: relative;
    width: 28px;
    font-size: 35px;
    color: #ffd500;
    cursor: pointer
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
}
</style>


</head>
