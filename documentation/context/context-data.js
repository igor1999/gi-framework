/*
 * This file is part of PHP-framework GI.
 *
 * PHP-framework GI is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * PHP-framework GI is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with PHP-framework GI. If not, see <https://www.gnu.org/licenses/>.
 */
let contextData = {
    'GI\\Application\\Call\\Web\\Call': {
        context: [
            'GI\\I18n\\Locales\\UserLocaleContextInterface'
        ],
        references: [
            'GI\\FileSystem\\FSO\\Symlink\\URLHolder\\URLHolder',
            'GI\\Security\\CSRF\\CSRF'
        ]
    },
    'GI\\CLI\\Colorizing\\Colorizing': {
        context: [
            'GI\\CLI\\Colorizing\\Context\\ContextInterface'
        ]
    },
    'GI\\CLI\\CommandLine\\CommandLine': {
        context: [
            'GI\\CLI\\CommandLine\\Context\\AbstractContext',
            'GI\\CLI\\CommandLine\\Context\\ContextInterface'
        ]
    },
    'GI\\ClientContents\\Paging\\Common\\Paging': {
        context: [
            'GI\\ClientContents\\Paging\\Common\\Context\\Context',
            'GI\\ClientContents\\Paging\\Common\\ContextInterface'
        ]
    },
    'GI\\ClientContents\\Paging\\Dash\\Paging': {
        context: [
            'GI\\ClientContents\\Paging\\Dash\\Context\\Context',
            'GI\\ClientContents\\Paging\\Dash\\ContextInterface'
        ]
    },
    'GI\\ClientContents\\Paging\\Snapshot\\Paging': {
        context: [
            'GI\\ClientContents\\Paging\\Snapshot\\Context\\Context',
            'GI\\ClientContents\\Paging\\Snapshot\\ContextInterface'
        ]
    },
    'GI\\ClientContents\\Paging\\Wings\\Paging': {
        context: [
            'GI\\ClientContents\\Paging\\Wings\\Context\\Context',
            'GI\\ClientContents\\Paging\\Wings\\ContextInterface'
        ]
    },
    'GI\\Component\\*': {
        references: [
            'GI\\FileSystem\\FSO\\Symlink\\URLHolder\\URLHolder',
            'GI\\DOM\\*',
            'GI\\Markup\\Renderer\\AbstractRenderer'
        ]
    },
    'GI\\Component\\Authentication\\Login\\Login': {
        context: [
            'GI\\Component\\Authentication\\Login\\Context\\ContextInterface'
        ]
    },
    'GI\\Component\\Authentication\\Login\\Dialog\\Dialog': {
        context: [
            'GI\\Component\\Authentication\\Login\\Dialog\\Context\\AbstractContext',
            'GI\\Component\\Authentication\\Login\\Dialog\\Context\\ContextInterface'
        ],
        required: true,
        references: [
            'GI\\Identity\\AbstractIdentity'
        ]
    },
    'GI\\Component\\Authentication\\Logout\\Logout': {
        context: [
            'GI\\Component\\Authentication\\Logout\\Context\\AbstractContext',
            'GI\\Component\\Authentication\\Logout\\Context\\ContextInterface'
        ],
        required: true,
        references: [
            'GI\\Identity\\AbstractIdentity'
        ]
    },
    'GI\\Component\\Authentication\\Authentication': {
        references: [
            'GI\\Component\\Authentication\\Login\\Login',
            'GI\\Component\\Authentication\\Login\\Dialog\\Dialog',
            'GI\\Component\\Authentication\\Logout\\Logout'
        ]
    },
    'GI\\Component\\Autocomplete\\Autocomplete': {
        context: [
            'GI\\Component\\Autocomplete\\Context\\AbstractContext',
            'GI\\Component\\Autocomplete\\Context\\ContextInterface'
        ],
        required: true
    },
    'GI\\Component\\BreadCrumbs\\Chain\\View\\Widget': {
        context: [
            'GI\\Component\\BreadCrumbs\\Chain\\View\\Context\\Context',
            'GI\\Component\\BreadCrumbs\\Chain\\View\\Context\\ContextInterface'
        ]
    },
    'GI\\Component\\BreadCrumbs\\Chain\\AbstractBreadCrumbs': {
        references: [
            'GI\\Component\\BreadCrumbs\\Chain\\View\\Widget'
        ]
    },
    'GI\\Component\\BreadCrumbs\\Tree\\View\\Widget': {
        context: [
            'GI\\Component\\BreadCrumbs\\Tree\\View\\Context\\Context',
            'GI\\Component\\BreadCrumbs\\Tree\\View\\Context\\ContextInterface'
        ]
    },
    'GI\\Component\\BreadCrumbs\\Tree\\AbstractBreadCrumbs': {
        references: [
            'GI\\Component\\BreadCrumbs\\Tree\\View\\Widget'
        ]
    },
    'GI\\Component\\Captcha\\ImageText': {
        context: [
            'GI\\Component\\Captcha\\ImageText\\Context\\ContextInterface'
        ],
        references: [
            'GI\\Security\\Captcha\\ImageText\\ImageText'
        ]
    },
    'GI\\Component\\Locales\\Locales': {
        references: [
            'GI\\I18n\\Locales\\Sounding\\Sounding'
        ]
    },
    'GI\\Component\\Paging\\Common\\Common': {
        references: [
            'GI\\ClientContents\\Paging\\Common\\Paging'
        ]
    },
    'GI\\Component\\Paging\\Dash\\Dash': {
        references: [
            'GI\\ClientContents\\Paging\\Dash\\Paging'
        ]
    },
    'GI\\Component\\Paging\\Dropdown\\Dropdown': {
        references: [
            'GI\\ClientContents\\Paging\\Common\\Paging'
        ]
    },
    'GI\\Component\\Paging\\Snapshot\\Snapshot': {
        references: [
            'GI\\ClientContents\\Paging\\Snapshot\\Paging'
        ]
    },
    'GI\\Component\\Paging\\Wings\\Wings': {
        references: [
            'GI\\ClientContents\\Paging\\Wings\\Paging'
        ]
    },
    'GI\\Component\\Switcher\\Base\\View\\Widget': {
        context: [
            'GI\\Component\\Switcher\\Base\\View\\Context\\Context',
            'GI\\Component\\Switcher\\Base\\View\\Context\\ContextInterface'
        ],
        required: true
    },
    'GI\\Component\\Switcher\\Gender\\Gender': {
        references: [
            'GI\\Component\\Switcher\\Base\\View\\Widget'
        ]
    },
    'GI\\Component\\Switcher\\OnOff\\OnOff': {
        references: [
            'GI\\Component\\Switcher\\Base\\View\\Widget'
        ]
    },
    'GI\\Component\\Switcher\\Salutation\\Salutation': {
        references: [
            'GI\\Component\\Switcher\\Base\\View\\Widget'
        ]
    },
    'GI\\Component\\Switcher\\YesNo\\YesNo': {
        references: [
            'GI\\Component\\Switcher\\Base\\View\\Widget'
        ]
    },
    'GI\\Debugging\\*': {
        references: [
            'GI\\Debugging\\Base\\View\\AbstractView',
            'GI\\Debugging\\Handler\\Handler'
        ]
    },
    'GI\\Debugging\\Base\\View\\AbstractView': {
        context: [
            'GI\\Debugging\\Base\\View\\Context\\ContextInterface'
        ]
    },
    'GI\\Debugging\\Handler\\Handler': {
        context: [
            'GI\\Debugging\\Handler\\Context\\ContextInterface'
        ],
        references: [
            'GI\\Debugging\\Base\\View\\AbstractView'
        ]
    },
    'GI\\DOM\\*': {
        references: [
            'GI\\Util\\TextProcessing\\Encoding\\EncodingTrait',
            'GI\\Util\\TextProcessing\\XML\\Version\\VersionTrait'
        ]
    },
    'GI\\DOM\\HTML\\Element\\Input\\Hidden\\CSRF': {
        references: [
            'GI\\Security\\CSRF\\CSRF'
        ]
    },
    'GI\\DOM\\XML\\Element\\Root\\Declaration\\Declaration': {
        references: [
            'GI\\Util\\TextProcessing\\Encoding\\EncodingTrait',
            'GI\\Util\\TextProcessing\\XML\\Version\\VersionTrait'
        ]
    },
    'GI\\DOM\\XML\\Element\\Root\\Root': {
        references: [
            'GI\\DOM\\XML\\Element\\Root\\Declaration\\Declaration'
        ]
    },
    'GI\\Email\\*': {
        references: [
            'GI\\REST\\Response\\Header\\Status\\Status'
        ]
    },
    'GI\\FileSystem\\CSV\\Reader\\Reader': {
        context: [
            'GI\\FileSystem\\CSV\\Reader\\Context\\Context',
            'GI\\FileSystem\\CSV\\Reader\\Context\\ContextInterface'
        ]
    },
    'GI\\FileSystem\\CSV\\Writer\\Writer': {
        context: [
            'GI\\FileSystem\\CSV\\Writer\\Context\\Context',
            'GI\\FileSystem\\CSV\\Writer\\Context\\ContextInterface'
        ]
    },
    'GI\\FileSystem\\FSO\\Symlink\\URLHolder\\URLHolder': {
        context: [
            'GI\\FileSystem\\FSO\\Symlink\\URLHolder\\Context\\Context',
            'GI\\FileSystem\\FSO\\Symlink\\URLHolder\\Context\\ContextInterface'
        ]
    },
    'GI\\I18n\\Locales\\Main\\Main': {
        context: [
            'GI\\I18n\\Locales\\Main\\Context\\ContextInterface'
        ]
    },
    'GI\\I18n\\Locales\\Sounding\\Sounding': {
        context: [
            'GI\\I18n\\Locales\\UserLocaleContextInterface'
        ],
        references: [
            'GI\\I18n\\Translator\\Translator'
        ]
    },
    'GI\\I18n\\Translator\\Reader\\Reader': {
        references: [
            'GI\\I18n\\Locales\\Main\\Main'
        ]
    },
    'GI\\I18n\\Translator\\Translator': {
        references: [
            'GI\\I18n\\Translator\\Reader\\Reader'
        ]
    },
    'GI\\Identity\\AbstractIdentity': {
        context: [
            'GI\\Identity\\Context\\ContextInterface'
        ]
    },
    'GI\\Logger\\View\\View': {
        context: [
            'GI\\Logger\\View\\Context\\ContextInterface'
        ]
    },
    'GI\\Logger\\Logger': {
        context: [
            'logFiles: GI\\FileSystem\\FSO\\FSOFile\\Collection\\HashSet\\HashSetInterface'
        ],
        required: true,
        references: [
            'GI\\Logger\\View\\View'
        ]
    },
    'GI\\Logger\\Controller\\AbstractController': {
        references: [
            'GI\\Logger\\Logger'
        ]
    },
    'GI\\Markup\\Reader\\AbstractReader': {
        references: [
            'GI\\Util\\TextProcessing\\Encoding\\EncodingTrait',
            'GI\\Util\\TextProcessing\\XML\\Version\\VersionTrait'
        ]
    },
    'GI\\Markup\\Renderer\\AbstractRenderer': {
        references: [
            'GI\\Util\\TextProcessing\\Encoding\\EncodingTrait'
        ]
    },
    'GI\\RDB\\Driver\\AbstractDriver': {
        context: [
            'GI\\RDB\\Driver\\Context\\*'
        ],
        required: true
    },
    'GI\\RDB\\Synchronizing\\*': {
        references: [
            'GI\\RDB\\Synchronizing\\Dump\\Dump',
            'GI\\RDB\\Synchronizing\\Check\\Check'
        ]
    },
    'GI\\RDB\\Synchronizing\\Dump\\Dump': {
        context: [
            'GI\\RDB\\Synchronizing\\Context\\ContextInterface'
        ],
        references: [
            'GI\\RDB\\Driver\\AbstractDriver',
            'GI\\Markup\\Renderer\\AbstractRenderer',
            'GI\\RDB\\Synchronizing\\ResultMessageCreator\\ResultMessageCreator'
        ]
    },
    'GI\\RDB\\Synchronizing\\Check\\Check': {
        context: [
            'GI\\RDB\\Synchronizing\\Context\\ContextInterface'
        ],
        references: [
            'GI\\RDB\\Driver\\AbstractDriver',
            'GI\\Markup\\Reader\\AbstractReader',
            'GI\\Markup\\Renderer\\AbstractRenderer',
            'GI\\RDB\\Synchronizing\\ResultMessageCreator\\ResultMessageCreator'
        ]
    },
    'GI\\RDB\\Synchronizing\\ResultMessageCreator\\ResultMessageCreator': {
        context: [
            'GI\\RDB\\Synchronizing\\ResultMessageCreator\\Context\\Context',
            'GI\\RDB\\Synchronizing\\ResultMessageCreator\\Context\\ContextInterface'
        ]
    },
    'GI\\REST\\Request\\Body\\Body': {
        context: [
            'GI\\Markup\\Reader\\ReaderInterface'
        ]
    },
    'GI\\REST\\Response\\Header\\Status\\Status': {
        context: [
            'GI\\REST\\Response\\Header\\Status\\Context\\Context',
            'GI\\REST\\Response\\Header\\Status\\Context\\ContextInterface'
        ]
    },
    'GI\\REST\\Response\\*': {
        references: [
            'GI\\REST\\Response\\Header\\Status\\Status'
        ]
    },
    'GI\\Security\\Captcha\\ImageText\\ImageText': {
        context: [
            'GI\\Security\\Captcha\\ImageText\\Context\\ContextInterface'
        ],
        references: [
            'GI\\Security\\Captcha\\ImageText\\Graphic\\Graphic'
        ]
    },
    'GI\\Security\\Captcha\\ImageText\\Graphic\\Graphic': {
        context: [
            'GI\\Security\\Captcha\\ImageText\\Graphic\\Context\\Context',
            'GI\\Security\\Captcha\\ImageText\\Graphic\\Context\\ContextInterface'
        ],
        required: true
    },
    'GI\\Security\\CSRF\\CSRF': {
        context: [
            'GI\\Security\\CSRF\\Context\\ContextInterface'
        ]
    },
    'GI\\SocketDemon\\*': {
        references: [
            'GI\\SocketDemon\\Demon\\Demon',
            'GI\\SocketDemon\\Exchange\\Request\\*',
            'GI\\SocketDemon\\Socket\\Client\\Collection\\Collection',
            'GI\\SocketDemon\\Socket\\Client\\Item\\Item',
            'GI\\SocketDemon\\Socket\\Server\\Server',
            'GI\\CLI\\CommandLine\\CommandLine',
            'GI\\Logger\\Logger'
        ]
    },
    'GI\\SocketDemon\\Demon\\Demon': {
        context: [
            'GI\\SocketDemon\\Demon\\Context\\ContextInterface',
        ]
    },
    'GI\\SocketDemon\\Exchange\\Request\\*': {
        context: [
            'GI\\SocketDemon\\Exchange\\Request\\Context\\AbstractContext',
            'GI\\SocketDemon\\Exchange\\Request\\Context\\ContextInterface',
        ],
        required: true
    },
    'GI\\SocketDemon\\Socket\\Client\\Collection\\Collection': {
        context: [
            'GI\\SocketDemon\\Socket\\Client\\Collection\\Context\\ContextInterface',
        ]
    },
    'GI\\SocketDemon\\Socket\\Client\\Item\\Item': {
        context: [
            'GI\\SocketDemon\\Socket\\Client\\Item\\Context\\AbstractContext',
            'GI\\SocketDemon\\Socket\\Client\\Item\\Context\\ContextInterface',
        ]
    },
    'GI\\SocketDemon\\Socket\\Server\\Server': {
        context: [
            'GI\\SocketDemon\\Socket\\Server\\Context\\ContextInterface'
        ],
        required: true
    },
    'GI\\Util\\Crypt\\Password\\Encriptor\\Encriptor': {
        context: [
            'GI\\Util\\Crypt\\Password\\Encriptor\\Context\\ContextInterface'
        ]
    },
    'GI\\Util\\Crypt\\Random\\Word\\Alphabet\\Alphabet': {
        context: [
            'GI\\Util\\Crypt\\Random\\Word\\Alphabet\\Context\\ContextInterface'
        ]
    },
    'GI\\Util\\Crypt\\Random\\Word\\Word': {
        references: [
            'GI\\Util\\Crypt\\Random\\Word\\Alphabet\\Alphabet'
        ]
    },
    'GI\\Util\\TextProcessing\\Escaper\\*': {
        references: [
            'GI\\Util\\TextProcessing\\Encoding\\EncodingTrait',
            'GI\\Util\\TextProcessing\\XML\\Version\\VersionTrait'
        ]
    },
    'GI\\Util\\TextProcessing\\Encoding\\EncodingTrait': {
        context: [
            'GI\\Util\\TextProcessing\\Encoding\\Context\\ContextInterface'
        ]
    },
    'GI\\Util\\TextProcessing\\XML\\Version\\VersionTrait': {
        context: [
            'GI\\Util\\TextProcessing\\XML\\Version\\Context\\ContextInterface'
        ]
    }
};