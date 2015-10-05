<input class="[ js-selector-storage ]" type="hidden" name="<?= $field->name() ?>" id="<?= $field->name() ?>" value="<?= implode(',', $field->value()) ?>" />

<?php if ($field->files()->count() > 0): ?>
    <div class="input input-with-items">

        <?php foreach ($field->files() as $file): ?>
            <div id="<?= $field->itemId($file) ?>" class="item item-with-image [ selector-item js-selector-item ]" data-file="<?= $file->filename() ?>" <?= r($field->isInValue($file), 'data-checked="true"') ?> >
                <div class="item-content">
                    <?php if ($file->type() == 'image'): ?>
                        <figure class="item-image">
                            <a class="btn btn-with-icon" href="<?= purl($file, 'show') ?>" title="<?= l('pages.show.subpages.edit') ?>">
                                <?= thumb($file, array('width' => 48, 'height' => 48, 'crop' => true)) ?>
                            </a>
                        </figure>
                    <?php else: ?>
                        <figure class="item-image item-filetype">
                            <a class="btn btn-with-icon" href="<?= purl($file, 'show') ?>" title="<?= l('pages.show.subpages.edit') ?>">
                                <?= strtoupper($file->extension()) ?>
                            </a>
                        </figure>
                    <?php endif ?>
                    <div class="item-info">
                        <div class="fix">
                            <strong class="item-title">
                                <?= $file->filename() ?>
                            </strong>
                            <small class="item-meta marginalia">
                                <?= $file->type() ?> / <?= $file->niceSize() ?>
                                <?php if ($file->type() == 'image'): ?>
                                    / <?= $file->width() ?> x <?= $file->height() ?>
                                <?php endif ?>
                            </small>
                        </div>
                    </div>
                </div>

                <nav class="item-options">
                    <ul class="nav nav-bar">
                        <li>
                            <a class="btn btn-with-icon" href="<?= purl($file, 'show') ?>" title="<?= l('pages.show.subpages.edit') ?>">
                                <i class="icon icon-left fa fa-pencil"></i>
                                <span><?= l('pages.show.subpages.edit') ?></span>
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-with-icon [ selector-checkbox js-selector-checkbox ]" href="#" title="<?= l::get('selector.select') ?>">
                                <i class="icon icon-left fa fa-circle-o"></i>
                                <span><?= l::get('selector.select') ?></span>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
        <?php endforeach ?>

    </div>
<?php else: ?>
    <div class="message">
        <span class="message-content"><?= l::get('selector.empty') ?></span>
    </div>
<?php endif ?>
