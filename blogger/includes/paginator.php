<nav>
    <ul>
        <?php if ($paginator->previous) : ?>
            <li> <a href="?page=<?= $paginator->previous; ?>">Prev</a></li>
        <?php else : ?>
            <li> Prev</li>
        <?php endif; ?>

        <?php if ($paginator->next) : ?>
            <li> <a href="?page=<?= $paginator->next; ?>">Next</a></li>
        <?php else : ?>
            <li>Next</li>
        <?php endif; ?>
    </ul>
</nav>