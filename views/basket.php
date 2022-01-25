<h2>Корзина</h2>

<?php if (!empty($basket)) : ?>
    <?php foreach ($basket as $item): ?>
    <div id="<?= $item['basket_id'] ?>">
        <h2><?= $item['name'] ?></h2>
        <p>Описание: <?= $item['description'] ?></p>
        <p>Цена: <?= $item['price'] ?></p>

        <button data-id="<?= $item['basket_id'] ?>" class="delete">Удалить</button>
    </div>
    <?php endforeach; ?>
<?php else: ?>
    Корзина пуста
<?php endif; ?>

<script>
    let buttons = document.querySelectorAll('.delete');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/basket/delete', {
                        method: 'POST',
                        headers: new Headers({
                            'Content-Type': 'application/json'
                        }),
                        body: JSON.stringify({
                            id: id
                        })
                    })
                    const answer = await response.json();
                    document.getElementById('count').innerText = answer.count;
                    document.getElementById(id).remove();
                }
            )();
        })
    });
</script>