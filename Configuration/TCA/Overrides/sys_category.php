<?php
defined('TYPO3_MODE') or die();

$ll = 'LLL:EXT:rkw_digi_kit/Resources/Private/Language/locallang_db.xlf:';

/**
 * Additional columns
 */
$additionalColumns = [
    'digikit_level_one_image' => [
        'exclude' => 1,
        'label' => $ll . 'digikit_level_one_image',
        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            'digikit_level_one_image',
            [
                'maxitems' => 1,
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                ],
                'foreign_types' => [
                    '0' => [
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                    ],
                ]
            ],
            $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
        )
    ],
    'digikit_level_one_settings' => [
        'exclude' => 1,
        'label' => $ll . 'digikit_level_one_settings',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['Top Left', '--color-1;c-tile-nav__column--order-1;--category-1;--top-left'],
                ['Top Right', '--color-2;c-tile-nav__column--order-2;--category-1;--top-right'],
                ['Bottom Left', '--color-4;c-tile-nav__column--order-3;--category-4;--bottom-left'],
                ['Bottom Right', '--color-3;c-tile-nav__column--order-4;--category-3;--bottom-right']
            ],
            'size' => 1
        ]
    ],
    'digikit_level_two_title_override' => [
        'exclude' => 1,
        'label' => $ll . 'digikit_level_two_title_override',
        'config' => [
            'type' => 'input',
            'size' => 20,
            'eval' => 'trim'
        ]
    ],
    'digikit_level_two_position' => [
        'exclude' => 1,
        'label' => $ll . 'digikit_level_two_position',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['Default', ''],
                ['Top', '--x'],
                ['Right', '--y'],
                ['Left', '--x2'],
                ['Bottom', '--y2']
            ],
            'size' => 1
        ]
    ],
    'digikit_level_three_title_override' => [
        'exclude' => 1,
        'label' => $ll . 'digikit_level_three_title_override',
        'config' => [
            'type' => 'input',
            'size' => 20,
            'eval' => 'trim'
        ]
    ],
    'digikit_level_three_position' => [
        'exclude' => 1,
        'label' => $ll . 'digikit_level_three_position',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['Default', ''],
                ['Top', '--x'],
                ['Right', '--y'],
                ['Left', '--x2'],
                ['Bottom', '--y2']
            ],
            'size' => 1
        ]
    ]
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('sys_category', $additionalColumns);

/**
 * Palettes
 */
$palettes = [
    'DigiKitLevelOne' => [
        'showitem' => '
            digikit_level_one_settings,
            --linebreak--,
            digikit_level_one_image
        '
    ],
    'DigiKitLevelTwo' => [
        'showitem' => '
            digikit_level_two_title_override,
            digikit_level_two_position
        '
    ],
    'DigiKitLevelThree' => [
        'showitem' => '
            digikit_level_three_title_override,
            digikit_level_three_position
        '
    ]
];

$GLOBALS['TCA']['sys_category']['palettes'] = array_merge($GLOBALS['TCA']['sys_category']['palettes'], $palettes);

/**
 * Add additional columns|palettes to sys_category
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'sys_category',
    '--div--;DigiKit,
        --palette--;Menu First Level;DigiKitLevelOne,
        --palette--;Menu Second Level;DigiKitLevelTwo,
        --palette--;Menu Third Level;DigiKitLevelThree
    '
);