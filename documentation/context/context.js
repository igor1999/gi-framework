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
let contextBuilder = new function()
{
    window.addEventListener(
        'load',
        function()
        {
            let ul = document.getElementById('top');
            if (!ul) {
                throw new Error('Top UL not found');
            }

            build(contextData, ul);
        }
    );

    let build = function(data, ul)
    {
        for(let className in data) {
            let li = document.createElement('li');
            ul.appendChild(li);

            let a = document.createElement('a');
            a.href = 'javascript:void(0);';
            a.setAttribute('data-closed', '1');
            a.innerHTML = className;

            let title = document.createElement('div');
            title.className = 'class';
            title.appendChild(a);

            li.appendChild(title);

            let {context = false, references = false, required = false} = data[className];

            let contextUl    = context    ? buildContext(context, li, required) : false;
            let referencesUl = references ? buildReferences(references, li)     : false;

            addShowEvent(a, contextUl, referencesUl);
        }
    };

    let buildContext = function(context, li, required)
    {
        let contextUl = document.createElement('ul');
        contextUl.className = 'context';
        if (required) {
            contextUl.classList.add('required');
        }
        li.appendChild(contextUl);

        for (let i = 0; i <= context.length -1; i ++) {
            let contextLi = document.createElement('li');
            contextLi.innerHTML = context[i];

            contextUl.appendChild(contextLi);
        }

        return contextUl;
    };

    let buildReferences = function(references, li)
    {
        let referencesUl = document.createElement('ul');
        referencesUl.className = 'references';
        li.appendChild(referencesUl);

        let referencesData = {};
        for (let i = 0; i <= references.length -1; i ++) {
            referencesData[references[i]] = contextData[references[i]];
        }

        build(referencesData, referencesUl);

        return referencesUl;
    };

    let addShowEvent = function(a, contextUl, referencesUl)
    {
        a.addEventListener(
            'click',
            function()
            {
                let open = (a.getAttribute('data-closed') === '1');
                opener(contextUl, open);
                opener(referencesUl, open);

                let closed = open ? '' : '1';
                a.setAttribute('data-closed', closed);
            }
        );
    };

    let opener = function(ul, open)
    {
        if (ul) {
            ul.style.display = open ? 'block' : 'none';
        }
    };
};