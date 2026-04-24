<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation">
    <ul class="pagination pagination-fh mb-0">
        <?php if ($pager->hasPrevious()) : ?>
            <li>
                <a href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>" class="page-link-fh">
                    <span aria-hidden="true"><i class="fas fa-angles-left"></i></span>
                </a>
            </li>
            <li>
                <a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>" class="page-link-fh">
                    <span aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li>
                <a href="<?= $link['uri'] ?>" class="page-link-fh <?= $link['active'] ? 'active' : '' ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <li>
                <a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>" class="page-link-fh">
                    <span aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                </a>
            </li>
            <li>
                <a href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>" class="page-link-fh">
                    <span aria-hidden="true"><i class="fas fa-angles-right"></i></span>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>

<style>
.pagination-fh {
    display: flex;
    gap: 8px;
    list-style: none;
    padding: 0;
}
.page-link-fh {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    height: 42px;
    border-radius: 10px;
    background: #fff;
    border: 1.5px solid var(--fh-border);
    color: var(--fh-text);
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 0.95rem;
}
.page-link-fh:hover {
    border-color: var(--fh-primary-light);
    color: var(--fh-primary);
    background: var(--fh-blue-50);
}
.page-link-fh.active {
    background: var(--fh-primary);
    border-color: var(--fh-primary);
    color: #fff;
    box-shadow: 0 4px 12px rgba(30, 64, 175, 0.25);
}
</style>
