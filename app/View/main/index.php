 <div class="wrapper">
     <div class="nav">
         <div class="nav__logo">
             <img src="/assets/main/assets/images/logo.png" alt="logo" />
             <span>Freshmarket</span>
         </div>
         <div class="nav__links">
             <a href="#" class="active">Home</a>
             <a href="#">Categories</a>
             <a href="#">Flash sale</a>
             <a href="#">Our App</a>
         </div>
         <div>
             <a href="#" class="nav__cta btn-outline">Masuk</a>
             <a href="#" class="nav__cta btn">Daftar</a>
         </div>
     </div>
     <div class="hero-wrapper">
         <div class="hero">
             <div class="hero-color"></div>
             <div class="hero__content">
                 <h1 class="hero__title">Don’t miss our daily amazing deals.</h1>
                 <p class="hero__subtitle">Save up to 60% off on your first order</p>
                 <div class="hero__search-box">
                     <div class="input-group">
                         <i class="fa-regular fa-paper-plane" aria-hidden="true"></i>
                         <input type="text" placeholder="Enter your email address" />
                     </div>
                     <button class="btn">Subscribe</button>
                 </div>
             </div>
             <div class="hero__img">
                 <img src="/assets/main/assets/images/Hero-img.png" alt="hero" class="hero__img" />
             </div>
         </div>
     </div>
     <div class="category">
         <div class="category-header">
             <h2>Explore Categories</h2>
             <div>
                 <span class="see-all">See all</span>
             </div>
         </div>
         <div class="category-grid">
             <?php foreach ($model['category'] as $row) : ?>

                 <div class="category-box" style="background-color : <?= $row['bgColor'] ?>">
                     <img src="/assets/icon/<?= $row['icon'] ?>" alt="category" />
                     <div class="category-content">
                         <h3><?= $row['name'] ?></h3>
                         <span>20 items</span>
                     </div>
                 </div>
             <?php endforeach ?>

         </div>
     </div>
     <div class="category">
         <div class="category-header">
             <h2>Featured Products</h2>
             <div>
                 <span class="see-all">See all</span>
             </div>
         </div>
         <div class="product-grid">
             <?php foreach ($model['product'] as $row) : ?>
                 <div class="product-box">
                     <img src="/assets/product/<?= $row['image'] ?>" alt="product" />
                     <div class="product-content">
                         <span><?= $row['category_name'] ?></span>
                         <h4><?= $row['name'] ?></h4>
                         <div class="product-star">
                             <img src="/assets/main/assets/images/Star.png" />
                             <img src="/assets/main/assets/images/Star.png" />
                             <img src="/assets/main/assets/images/Star.png" />
                             <img src="/assets/main/assets/images/Star.png" />
                             <img src="/assets/main/assets/images/Star.png" />
                             <span>(4)</span>
                         </div>
                         <h5>By <span>Freshmarket</span></h5>
                         <div class="price-box">
                             <span class="product-price">$<?= $row['price'] ?></span>
                             <button class="btn-cart">Add</button>
                         </div>
                     </div>
                 </div>
             <?php endforeach ?>

         </div>
     </div>

     <div class="promo">
         <div class="promo-box">
             <div class="promo-content">
                 <span>Free delivery</span>
                 <h5>Free delivery over $50</h5>
                 <p>Shop $50 product and get free delivery anywhre.</p>
                 <button class="btn ">Shop Now</button>

             </div>
             <div class="promo-img">
                 <img src="/assets/main/assets/images/Offer1-img.png" alt="promo" />
             </div>
         </div>
         <div class="promo-box" style="background-color:  rgba(210, 239, 225, 0.85);">
             <div class="promo-content">
                 <span style="background-color: var(--primary);color: white">Free delivery</span>
                 <h5>Organic Food</h5>
                 <p>Save up to 60% off on your first order</p>
                 <button class="btn ">Order Now</button>

             </div>
             <div class="promo-img">
                 <img src="/assets/main/assets/images/Offer2-img.png" alt="promo" />
             </div>
         </div>
     </div>
     <div class="flash-sale">
         <div class="category-header">
             <h2>Flash Sale</h2>
             <div>
                 <span class="see-all">See all</span>
             </div>
         </div>
         <div class="product-grid">
             <?php foreach ($model['product'] as $row) : ?>
                 <div class="product-box">
                     <img src="/assets/product/<?= $row['image'] ?>" alt="product" />
                     <div class="product-content">
                         <span><?= $row['category_name'] ?></span>
                         <h4><?= $row['name'] ?></h4>
                         <div class="product-star">
                             <img src="/assets/main/assets/images/Star.png" />
                             <img src="/assets/main/assets/images/Star.png" />
                             <img src="/assets/main/assets/images/Star.png" />
                             <img src="/assets/main/assets/images/Star.png" />
                             <img src="/assets/main/assets/images/Star.png" />
                             <span>(4)</span>
                         </div>
                         <h5>By <span>Freshmarket</span></h5>
                         <div class="price-box">
                             <span class="product-price">$<?= $row['price'] ?></span>
                             <button class="btn-cart">Add</button>
                         </div>
                     </div>
                 </div>
             <?php endforeach ?>
         </div>
     </div>
 </div>