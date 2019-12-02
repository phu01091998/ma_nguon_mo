<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="fontawesome\css\all.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="bootstrap-4.3.1-dist\css\bootstrap.min.css" rel="stylesheet">
  <style>
    *{
      margin: 0;
      padding: 0;
    }
    nav{
      width:100%;
      position: fixed!important;
      z-index: 99;
    }
    a {
      text-decoration: none!important;
      color:#202124;
    }
    a:hover{
      color:#202124!important;
    }
    .loai:hover .aaa{
      color: #ffb204!important;
    }
    .qc:hover .qcshow{
      display: block!important;
    }
    
    ul{
      list-style: none;
    }
    li:hover{
      background: #4141;
    }
   
    @media (max-width:414px){
     .title-detail{
       font-size: 29px!important;
       margin-top: 18px;
     }
     .col-danhmuc{
       padding-left: 41px!important;
       padding-right: 0px!important;
     }
     .title-danhmuc{
       font-size: 14px!important;
       margin: 0!important;
     }
    }
    @media (max-width:375px){
      .twobtn{
        font-size: 0.5rem!important;
      }
    }
    @media (max-width:320px){
      .twobtn{
        font-size: 0.4rem!important;
      }
      .title-shop{
        font-size: 17px!important;
      }
    }
    @media (max-width:768px){
      .qc{
        display: none!important;
      }
      .img-inCart{
        display: none!important;
      }
     
    }
    @media (max-width:1024px){
      .img-inCart img{
        width: 80%!important;
        height: auto!important;
      }
      .input-quantity{
        width: 65%!important;
      }
     
    }
  </style>
</head>

<body class="">