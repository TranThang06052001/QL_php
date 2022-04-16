<?php
        require 'Asset/php/ConnectDb.php';
        $sqlResult="SELECT * FROM thucung";
        $Data = $conn->query($sqlResult);
        $ListPet=$Data->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Asset/CSS/index.css">
    <title>Quản Lý Sản Phẩm</title>
</head>

<body>
    <div id="App">
        <div class="header_wrapp">
            <div class="grid wide">
                <header id="header">
                    <a href="#" class="header__logo">
                        <img src="./Asset/img/logo.png" alt="#" class="header__logo_img">
                        <span>Aqua Forest</span>
                    </a>
                    <ul class="Header__nav">
                        <li class="header__nav-item">
                            <p class="header__nav-home">
                                <a href="#" class="header__nav-home-link item-text">
                                    <ion-icon name="home-outline"></ion-icon>
                                    <span>Home</span>
                                </a>
                            </p>
                        </li>
                        <li class="header__nav-item">
                            <p class="header__nav-login">
                                <a href="#" class="header__nav-login-link item-text">
                                    <ion-icon name="log-out-outline"></ion-icon>
                                    <span>Đăng xuất</span>
                                </a>
                            </p>
                        </li>
                        <li class="header__nav-item">
                            <p class="header__nav-avatar">
                                <a href="#" class="header__nav-avatar-link">
                                    <img src="./Asset/img/avatar.jpg" alt="#" class="header__nav-avatar-img">
                                </a>
                            </p>
                        </li>
                    </ul>
                </header>
            </div>
        </div>
        <div class="contaier">
            <div class="grid wide">
                <div class="row">
                    <div class="col l-3 m-0 c-0">
                        <div class="sideBar">
                            <p class="sideBar__title">Admin Menu</p>
                            <ul class="sideBar__list">
                                <li class="sideBar__list-item">
                                    <ion-icon name="create-outline"></ion-icon>
                                    Thú cưng
                                </li>
                                <li class="sideBar__list-item">
                                    <ion-icon name="create-outline"></ion-icon>
                                    Phụ kiện thú cưng
                                </li>
                                <li class="sideBar__list-item">
                                    <ion-icon name="create-outline"></ion-icon>
                                    Đơn hàng
                                </li>
                                <li class="sideBar__list-item">
                                    <ion-icon name="create-outline"></ion-icon>
                                    Tin tức
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col l-9 m-12 c-12">
                        <div class="main">
                            <div class="main__header">
                                <div class="main__header-search">
                                    <form class="main__header-search-form" action="" method="post">
                                        <input autocomplete="off" class="main__header-search-form-input" type="text" name="search" placeholder="Enter search...">
                                        <button class="main__header-search-form-btn" type="submit">
                                            <ion-icon class="main__header-search-form-btn-icon" name="search-outline"></ion-icon>
                                        </button>
                                    </form>
                                </div>
                                <div class="main__header-right">
                                    <button class="main__header-right-add">
                                        <ion-icon class="main__header-right-add-icon" name="add-outline"></ion-icon>
                                        <span>Add</span>
                                    </button>
                                </div>
                            </div>
                            <div class="main__form">
                                <form class="main__form-primary" action="/AddProduct.php" enctype="multipart/form-data" method="POST">
                                    <div class="main__form-primary-wrapp">
                                        <label for="img-pet"> <img class="main__form-primary-wrapp-img" src="./Asset/img/noImg.png" alt="#"></label>
                                        <input id="img-pet" class="main__form-primary-wrapp-input" type="file" name="image-pet">
                                    </div>
                                    <div class="main__form-primary-info">
                                        <div class="main__form-primary-info-id form-info">
                                            <label class="main__label" for="id-pet">Mã thú cưng :</label>
                                            <input class="main__inputADD" id="id-pet" type="text" name="id-pet" placeholder="">
                                        </div>
                                        <div class="main__form-primary-info-name form-info">
                                            <label class="main__label" for="name-pet">Tên thú cưng :</label>
                                            <input class="main__inputADD" id="name-pet" type="text" name="name-pet">
                                        </div>
                                        <div class="main__form-primary-info-type form-info">
                                            <label class="main__label" for="type-pet">Loại :</label>
                                            <input class="main__inputADD" id="type-pet" type="text" name="type-pet">
                                        </div>
                                        <button class="main__submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="main__list">
                                <table border="1" cellspacing='0' cellpadding='2' class="main__list-table">
                                    <tr class="main__list-header">
                                        <th class="main__list-header-text">Hình ảnh thú cưng</th>
                                        <th class="main__list-header-text">Mã thú cưng</th>
                                        <th class="main__list-header-text">Tên thú cưng</th>
                                        <th class="main__list-header-text">Loại thú cưng</th>
                                        <th class="main__list-header-text">Xóa</th>
                                    </tr>
                                    <?php
                                   foreach ( $ListPet as $pet  ){
                                    echo "<tr class='main__list-product'>";
                                    echo " <td class='main__list-product-img'>";
                                    echo "<img src={$pet['URLimage']} alt='#'>";
                                    echo " </td>";
                                    echo " <td class='main__list-product-text'>{$pet['CODE']}</td>";
                                    echo " <td class='main__list-product-text'>{$pet['NAME']}</td>";
                                    echo " <td class='main__list-product-text'>{$pet['TYPE']}</td>";
                                    echo "<td class='main__list-product-text'>";
                                    echo " <a href='/DeleteProduct.php?CODE={$pet['CODE']}&URLimage={$pet['URLimage']}'><ion-icon name='trash-outline'></ion-icon></a>";
                                      echo"</td>";
                                    echo " </tr>";
                                   }
                                     ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cover Hide">
        <div class="cover-main__form">
            <span class="main-close">
                <ion-icon name="close-outline"></ion-icon>
            </span>
            <form class="main__form-primary" action="./index.php" method="post">
                <div class="main__form-primary-wrapp">
                    <label for="cover-img-pet">
                        <img class="main__form-primary-wrapp-img" src="./Asset/img/noImg.png" alt="#">
                    </label>
                    <input id="cover-img-pet" class="main__form-primary-wrapp-input" type="file" name="image-pet">
                </div>
                <div class="main__form-primary-info">
                    <div class="main__form-primary-info-id form-info">
                        <label class="main__label" for="cover-id-pet">Mã thú cưng :</label>
                        <input class="main__inputADD" id="cover-id-pet" type="text" name="id-pet" placeholder="">
                    </div>
                    <div class="main__form-primary-info-name form-info">
                        <label class="main__label" for="cover-name-pet">Tên thú cưng :</label>
                        <input class="main__inputADD" id="cover-name-pet" type="text" name="name-pet">
                    </div>
                    <div class="main__form-primary-info-type form-info">
                        <label class="main__label" for="cover-type-pet">Loại :</label>
                        <input class="main__inputADD" id="cover-type-pet" type="text" name="type-pet">
                    </div>
                    <div class="main__group-btn">
                        <button class="main__update main-btn">
                            Sửa
                            <ion-icon name="build-outline"></ion-icon>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
    <script>
        const mainForm = document.querySelector('.main__form')
        const mainCoverForm = document.querySelector('.cover-main__form')
        const addBtn = document.querySelector('.main__header-right-add')
        const mainClose = document.querySelector('.main-close')
        const cover = document.querySelector('.cover')
        const covmain__list = document.querySelector('.main__list-product')
        const handleOnclick = () => {
            mainForm.classList.toggle('unHide')
            mainForm.classList.contains('unHide') ? addBtn.innerHTML = 'Hủy' :
                addBtn.innerHTML = `<ion-icon class="main__header-right-add-icon" name="add-outline"></ion-icon><span>Add</span>`
        }
        const handleOnClose = () => {
            cover.classList.add('Hide')
        }
        const handleOnCovmaiList = () => {
            cover.classList.remove('Hide')
        }
        addBtn.onclick = handleOnclick
        mainClose.onclick = handleOnClose
        mainCoverForm.onclick = (e) => {
            e.stopPropagation();
        }
        cover.onclick = handleOnClose
        covmain__list.ondblclick = handleOnCovmaiList
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>