<?php if (!dynamic_sidebar('sidebar-homepage')) : ?>
    <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 380px;">
        <div class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
            <span class="fs-5 fw-semibold">Archives</span>
        </div>
        <div class="list-group list-group-flush border-bottom scrollarea">
            <div class="list-group-item list-group-item-action py-3 lh-sm">
                <?php wp_get_archives(['type' => 'monthly']); ?>
            </div>
        </div>
    </div>
<?php endif; ?>