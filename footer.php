        <footer>
            <ul>
                <li>Qui m'aime me suive !</li>
                <?php if(twitter_account()): ?>
                <li><a href="<?php echo twitter_url(); ?>" class="twitter" title="Suivez moi sur Twitter : <?php echo twitter_account(); ?>"></a></li>
                <?php endif; ?>
                <?php if(github_account()): ?>
                <li><a href="<?php echo github_url(); ?>" class="github" title="Suivez moi sur Github : <?php echo github_account(); ?>"></a></li>
                <?php endif; ?>
            </ul>
        </footer>

        <script src="<?php echo theme_url('/js/highlight.pack.js'); ?>"></script>
        <script>
            // Colorize <meta>
            var colors = ['red', 'green', 'blue', 'pink', 'purple'];
            var selectedColor = colors[Math.floor(Math.random() * (colors.length - 1))];

            document.body.setAttribute('class', document.body.getAttribute('class') + ' ' + selectedColor);
            document.body.setAttribute('className', document.body.getAttribute('className') + ' ' + selectedColor); // IE

            // Highlightjs
            hljs.initHighlightingOnLoad();
        </script>
    </body>
</html>