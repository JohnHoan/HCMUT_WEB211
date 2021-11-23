<div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="/web211/HomeController/index">Trang chủ</a></li>
                    <i class='bx bx-right-arrow-alt'></i>
                    <li class="active"><a href="/web211/HomeController/products">Sản phẩm</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
<div class="main-shop-page pt-100 pb-100 ptb-sm-60">
    <div class="container">
        <!-- Row End -->
        <div class="row">
            <div class="col-lg-3 order-2 order-lg-1">
                <div class="sidebar">
                    <div class="electronics mb-40">
                        <h3 class="sidebar-title">Danh mục sản phẩm</h3>
                        <div id="shop-cate-toggle" class="category-menu sidebar-menu sidbar-style">
                            <ul>
                                <li ><a href="#">Chăm Sóc Sức Khỏe</a>
                                            </li>
                                <li ><a href="#">Chất Tẩy Rửa Tự Nhiên</a>
                                    
                                </li>
                                <li ><a href="#">Làm Đẹp</a>                                            
                                </li>
                                
                            </ul>
                        </div>
                        <!-- category-menu-end -->
                    </div>
                    <!-- Sidebar Electronics Categorie End -->
                    <!-- Sidebar Categorie Start -->
                    <div class="sidebar-categorie mb-40">
                        <h3 class="sidebar-title">Từ khoá</h3>
                        <ul class="sidbar-style">
                            <li class="form-check">
                                <input class="form-check-input" value="#" id="botgung" type="checkbox">
                                <label class="form-check-label" for="botgung">Bột gừng</label>
                            </li>
                            <li class="form-check">
                                <input class="form-check-input" value="#" id="nuocrua" type="checkbox">
                                <label class="form-check-label" for="nuocrua">Nước rửa chén bồ hòn</label>
                            </li>
                            
                        </ul>
                    </div>
                    
                    
                </div>
            </div>
            
            <div class="col-lg-9 order-1 order-lg-2">
                <!-- Grid & List View Start -->
                <div class="grid-list-top border-default universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
                    
                    <div class="main-toolbar-sorter clearfix">
                        <div class="toolbar-sorter d-flex align-items-center">
                            <label>Thứ tự:</label>
                            <select class="sorter wide">
                                <option value="Position">Mặc định</option>
                                <option value="Product Name">Mức phổ biến</option>
                                <option value="Product Name">Mới nhất</option>
                                <option value="Price">Giá: Thấp đến cao</option>
                                <option value="Price" selected="">Giá: cao đến thấp</option>
                            </select>
                        </div>
                    </div>
                    <!-- Toolbar Short Area End -->
                    <!-- Toolbar Short Area Start -->
                    <div class="main-toolbar-sorter clearfix">
                        <div class="toolbar-sorter d-flex align-items-center">
                            <label>Show:</label>
                            <select class="sorter wide">
                                <option value="12">5</option>
                                <option value="25">10</option>
                                <option value="50">20</option>
                                
                            </select>
                        </div>
                        
                    </div>
                    <!-- Toolbar Short Area End -->
                </div>
                <!-- Grid & List View End -->
                
                <div class="main-categorie mb-all-40">
                    <!-- Grid & List Main Area End -->
                    <div class="tab-content fix">
                        <div id="grid-view" class="tab-pane fade show active">
                            <div class="row">
                                <?php foreach($data['product_list'] as $product){ 
                                extract($product);
                                ?> 
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product_detail/<?=$product['id']?>">
                                                <img class="primary-img" src="../public/assets/product_images/<?=$product['image']?>"alt="single-product">
                                            </a>
                                            <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class='bx bxs-hand'></i></a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info">
                                                <h4><a href="#"><?=$product['name']?></a></h4>
                                                <p><span class="price"><?php $num = (int)$product['price']/1000;
                                                echo (string)$num?>K</span></p>
                                            </div>
                                            <div class="pro-actions" id="btn_add_cart">
                                                <div class="actions-primary">
                                                    <a href="" title="Add to Cart"> + Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                <?php } ?>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>






