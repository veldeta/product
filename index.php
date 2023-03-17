<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php if( true ): ?>asd
    <p>hello</p>
    <div>
        <h1>World</h1>
    </div>
<?php endif; ?>

</body>
</html>
[
            "SELECT
                 catalog.id,
                 ROUND(cost * items.count, 2) as cost,
                 IFNULL(items.count, 0) as quantity,
                 IFNULL(catalog.provider, '') as id_vendor,
                 catalog.category,
                 set_id,
                 set_name,
                 ROUND((items.new_price - (items.new_price * sets.paid_bonus_percent)), 2) as new_price,
                 ROUND(items.old_price, 2) as old_price,
                 ROUND((items.total_sum - (items.total_sum * sets.paid_bonus_percent)), 2) as total_sum,
                 ROUND(catalog.price, 2) as price,
                 sets.date_create,
                 sets.payment_method
             FROM catalog_sets_items items",
            ' LEFT JOIN catalog ON catalog.id = items.catalog_id ',
            ' LEFT JOIN catalog_sets sets ON sets.id = items.set_id ',
            " WHERE items.set_id IN (${catalogSetsPlainIds})",
        ]