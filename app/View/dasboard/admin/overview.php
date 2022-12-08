<div class="content">
    <div class="row">
        <div class="col-12">
            <h2 class="content-title">Statistics</h2>
            <h5 class="content-desc mb-4">Your business growth</h5>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="statistics-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column justify-content-between align-items-start">
                        <h5 class="content-desc">Total Product</h5>

                        <h3 class="statistics-value"><?= count($model['product']) ?></h3>
                    </div>


                </div>


            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="statistics-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column justify-content-between align-items-start">
                        <h5 class="content-desc">Total Category</h5>

                        <h3 class="statistics-value"><?= count($model['category']) ?></h3>
                    </div>


                </div>

            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="statistics-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column justify-content-between align-items-start">
                        <h5 class="content-desc">Total users</h5>

                        <h3 class="statistics-value">0</h3>
                    </div>


                </div>


            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 col-lg-6">
            <h2 class="content-title">Last upload Product</h2>
            <h5 class="content-desc mb-4">Standard procedure</h5>
            <?php foreach ($model['product'] as $row) : ?>
                <div class="document-card">
                    <div class="document-item">
                        <div class="d-flex justify-content-start align-items-center">

                            <div class="document-icon box">
                                <img src="/assets/icon/<?= $row['category_icon'] ?>" alt="" />
                            </div>
                            <div class="d-flex flex-column justify-content-between align-items-start">
                                <h2 class="document-title"><?= $row['name'] ?></h2>

                                <span class="document-desc"><?= $row['category_name'] ?></span>
                            </div>
                        </div>


                    </div>


                </div>
            <?php endforeach; ?>

        </div>

        <!-- <div class="col-12 col-lg-6">
            <h2 class="content-title">History</h2>
            <h5 class="content-desc mb-4">Track the flow</h5>

            <div class="document-card">
                <div class="document-item">
                    <div class="d-flex justify-content-start align-items-center">
                        <img class="document-icon" src="./assets/img/home/history/photo.png" alt="" />

                        <div class="d-flex flex-column justify-content-between align-items-start">
                            <h2 class="document-title">Amalia Syahrina</h2>

                            <span class="document-desc">Promoted to Sr. Website Designer</span>
                        </div>
                    </div>
                </div>

                <div class="document-item">
                    <div class="d-flex justify-content-start align-items-center">
                        <img class="document-icon" src="./assets/img/home/history/photo-1.png" alt="" />

                        <div class="d-flex flex-column justify-content-between align-items-start">
                            <h2 class="document-title">Ah Park Yo</h2>

                            <span class="document-desc">Promoted to Front-End Developer</span>
                        </div>
                    </div>
                </div>

                <div class="document-item">
                    <div class="d-flex justify-content-start align-items-center">
                        <img class="document-icon" src="./assets/img/home/history/photo-2.png" alt="" />

                        <div class="d-flex flex-column justify-content-between align-items-start">
                            <h2 class="document-title">Sintia Siny</h2>

                            <span class="document-desc">Promoted to Accounting Executive</span>
                        </div>
                    </div>
                </div>

                <div class="document-item">
                    <div class="d-flex justify-content-start align-items-center">
                        <img class="document-icon" src="./assets/img/home/history/photo-3.png" alt="" />

                        <div class="d-flex flex-column justify-content-between align-items-start">
                            <h2 class="document-title">Jerami Putu</h2>

                            <span class="document-desc">Promoted to Quality Manager</span>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>