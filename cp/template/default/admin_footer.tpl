        </div>
    </div>
    <footer class="footer">
        <p><?php echo $copyright; ?></p>
    </footer>
</div>
<?php if(!$disable_cron) { ?>
<noscript>
    <img src="<?php echo BASE_URL; ?>/cron.php?type=image" alt="" border="0" />
</noscript>
<?php } ?>
</body>
</html>