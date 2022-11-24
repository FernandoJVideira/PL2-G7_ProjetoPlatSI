<?php
/** @var string $name */
/** @var array $id */
/** @var string $selected */

$paises = [
            'Portugal' => 'Portugal',
            'Aland Islands' => 'Ilhas Aland',
            'Albania' => 'Albânia',
            'Andorra' => 'Andorra',
            'Austria' => 'Áustria',
            'Belarus' => 'Bielo-Rússia',
            'Bulgaria' => 'Bulgária',
            'Croatia' => 'Croácia',
            'Czech Republic' => 'República Checa',
            'Denmark' => 'Dinamarca',
            'Estonia' => 'Estônia',
            'Faroe Islands' => 'ilhas Faroe',
            'Finland' => 'Finlândia',
            'France' => 'França',
            'Germany' => 'Alemanha',
            'Gibraltar' => 'Gibraltar',
            'Greece' => 'Grécia',
            'Guernsey' => 'Guernsey',
            'Holy See (Vatican City State)' => 'Santa Sé (Estado da Cidade do Vaticano)',
            'Hungary' => 'Hungria',
            'Iceland' => 'Islândia',
            'Ireland' => 'Irlanda',
            'Isle of Man' => 'Ilha de Man',
            'Italy' => 'Itália',
            'Jersey' => 'Jersey',
            'Kosovo' => 'Kosovo',
            'Latvia' => 'Letônia',
            'Liechtenstein' => 'Liechtenstein',
            'Lithuania' => 'Lituânia',
            'Luxembourg' => 'Luxemburgo',
            'Macedonia, the Former Yugoslav Republic of' => 'Macedônia, Antiga República Iugoslava da',
            'Malta' => 'Malta',
            'Moldova, Republic of' => 'Moldávia, República da',
            'Monaco' => 'Mônaco',
            'Montenegro' => 'Montenegro',
            'Netherlands' => 'Países Baixos',
            'Norway' => 'Noruega',
            'Poland' => 'Polônia',
            'Romania' => 'Romênia',
            'San Marino' => 'San Marino',
            'Serbia' => 'Sérvia',
            'Serbia and Montenegro' => 'Sérvia e Montenegro',
            'Slovakia' => 'Eslováquia',
            'Slovenia' => 'Eslovênia',
            'Spain' => 'Espanha',
            'Svalbard and Jan Mayen' => 'Svalbard e Jan Mayen',
            'Sweden' => 'Suécia',
            'Switzerland' => 'Suíça',
            'Ukraine' => 'Ucrânia',
            'United Kingdom' => 'Reino Unido'
        ];

?>
<label>Pais</label>
<select class="custom-select form-control" name="<?= $name ?>" id="<?= $id ?>">
    <?php foreach ($paises as $pais => $pais_name) : ?>
        <option value='<?= $pais ?>' <?= $pais == ($selected ?? null) ? 'selected' : '' ?> > <?= $pais_name ?></option>
    <?php endforeach;?>
</select>