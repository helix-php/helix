<?php
/**
 * @var string $class
 * @var \Helix\Boot\ExtensionInterface $ext
 */
echo '<?php';
?>


declare(strict_types=1);

/**
 * Configuration of <?=$ext->getName()?> extension.
 *
 * @package <?=$ext->getName()?>

 * @version <?php
echo $ext->getVersion();

if (! ($status = $ext->getStatus())->isStable()) {
    echo \sprintf(' (%s)', $status->toString());
}
?>

 */
return new <?=$class?>(
    // Here you can describe the configuration of <?=$ext->getName()?>.
);
