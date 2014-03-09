        <footer>
            <ul>
                <li>Suivez moi !</li>
                <?php if(twitter_account()): ?>
                <li><a href="<?php echo twitter_url(); ?>" class="twitter" title="Suivez moi sur Twitter : <?php echo twitter_account(); ?>"></a></li>
                <?php endif; ?>
                <?php if(github_account()): ?>
                <li><a href="<?php echo github_url(); ?>" class="github" title="Suivez moi sur Github : <?php echo github_account(); ?>"></a></li>
                <?php endif; ?>
            </ul>
        </footer>

        <script>
            var colors = ['red', 'green', 'blue', 'pink', 'purple'];
            var selectedColor = colors[Math.floor(Math.random() * (colors.length - 1))];

            document.body.setAttribute('class', document.body.getAttribute('class') + ' ' + selectedColor);
            document.body.setAttribute('className', document.body.getAttribute('className') + ' ' + selectedColor); // IE
        </script>
    </body>
</html>