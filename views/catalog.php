<h2>Каталог</h2>

<?php foreach ($catalog as $item): ?>
    <h3><a href="/product/card/?id=<?= $item['id'] ?>"><?= $item['name'] ?></a></h3>
    <p><?= $item['description'] ?></p>
    <p><?= $item['price'] ?> руб.</p>
    <button data-id="<?= $item['id'] ?>" class="buy" type="submit">Купить js</button>
    <form action="/basket/add" method="post">
        <input type="text" name="id" value="<?= $item['id'] ?>" hidden>
        <button type="submit">Купить php</button>
    </form>
    <hr>
<?php endforeach; ?>

<a href="/product/catalog/?page=<?= $page ?>">Далее</a>

<script>
    let buttons = document.querySelectorAll('.buy');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (
            async () => {
                const response = await fetch('/basket/add', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json;charset=utf-8'
                    },
                    body: JSON.stringify({
                        id: id
                    })
                });
                const answer = await response.json();
                document.getElementById('count').innerText = answer.count;
            }
            )();
        })
    });
</script>