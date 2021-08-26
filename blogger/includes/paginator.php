<nav aria-label="Page navigation example">
    <ul class="pagination d-flex justify-content-center">
        <?php if ($paginator->previous) : ?>
            <li class="page-item"> <a class="page-link" href="?page=<?= $paginator->previous; ?>">Prev</a></li>
        <?php else : ?>
            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Prev</a></li>
        <?php endif; ?>

        <?php if ($paginator->next) : ?>
            <li class="page-item"> <a class="page-link" href="?page=<?= $paginator->next; ?>">Next</a></li>
        <?php else : ?>
            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Next</a></li>
        <?php endif; ?>
    </ul>
</nav>