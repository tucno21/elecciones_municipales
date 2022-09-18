<?php include ext('layoutDash.menuDash') ?>

<footer class="footer">
    <div class="container-fluid">
        <div class="row text-muted">
            <div class="col-6 text-end">
                <p class="mb-0">
                    &copy; <?= date('Y') ?></a>
                </p>
            </div>
        </div>
    </div>
</footer>
</div>
</div>

<?php foreach ($linksScript as $value) : ?>
    <script src="<?= $value ?>"></script>
<?php endforeach; ?>

</body>

</html>