(function(){ 
    const mobileTrigger = document.getElementById('mobile-trigger'); 
    const mobileTriggerText = mobileTrigger.querySelector('.mobile-header__button__text');
    const mobileNavigation = document.getElementById('mobile-navigation'); 
    const mobileSubmenuToggles = document.querySelectorAll('.mobile-menu-primary__toggle');
    const navigationOverlay = document.querySelector('.navigation-overlay');
    const navClasses = mobileNavigation.classList;
    const bodyClasses = document.body.classList;
 
    // Toggle navigation classes
    function toggleNavigation(){
        return bodyClasses.contains('nav-active') ? closeNavigation() : openNavigation();
    }

    // Toggle menu button active text
    function toggleButtonText(){  
        const activeText = bodyClasses.contains('nav-active') ? 'Close' : 'Menu';
        mobileTriggerText.textContent = activeText;
        return mobileTriggerText.textContent;
    }  

    // Open menu & remove classes
    function openNavigation(){
        setInitialFocus();
        return ( navClasses.add('mobile-menu--active'), bodyClasses.add('nav-active') );
    }

    // Close menu & remove classes
    function closeNavigation(){
        return ( navClasses.remove('mobile-menu--active'), bodyClasses.remove('nav-active') );
    }

    // Open or close parent and/or sub menu panels
    function switchActiveMenuList(e){
        const targetSubmenu = e.target.dataset.open;
        const targetParent = e.target.dataset.close; 

        if( typeof targetSubmenu !== 'undefined' ) {
            const associatedMenu = document.getElementById(targetSubmenu);
            const isHidden = associatedMenu.getAttribute('aria-hidden');

            trapFocus(associatedMenu, true);
    
            return associatedMenu.setAttribute('aria-hidden', !isHidden);
        } else {            
            const parentMenu = document.getElementById(targetParent);
            const currentActiveMenu = parentMenu.querySelector('[aria-hidden="false"]');

            trapFocus(currentActiveMenu, false);

            return currentActiveMenu.setAttribute('aria-hidden', 'true');
        }
    }

    // Trap focus inside sub menu
    function trapFocus(menu, activeStatus){
        const focusableEls = menu.querySelectorAll(`#${menu.id} > li > a, #${menu.id} > li > button`);
        const initialFocus = focusableEls[1];

        // Set initial focus on first anchor
        initialFocus.focus();

        // If the sub menu has been closed, bring focus back to parent
        if( activeStatus === false ) {
            const setParentFocus = menu.parentNode.querySelector('button');
            setParentFocus.focus();
        }

        // Toggle between adding/removing event listener
        return activeStatus !== false ? menu.addEventListener('keydown', createFocusMenu) : menu.removeEventListener('keydown', createFocusMenu);
    }

    // Create the focus menu for the active sub menu
    function createFocusMenu(e){
        const focusableEls = e.target.closest('ul').querySelectorAll('a, button');
        const firstFocusableEl = focusableEls[0];
        const lastFocusableEl = focusableEls[focusableEls.length - 1];

        const isTabKey = e.key === 'Tab';
        const isShiftPressed = e.shiftKey;
        const currentFocusedElement = document.activeElement;

        if( isShiftPressed && isTabKey ) {
            if( currentFocusedElement === firstFocusableEl ){
                mobileSearch.focus();
                e.preventDefault();
            }
        } else if( isTabKey ) {
            if( currentFocusedElement === mobileSearch ){
                firstFocusableEl.focus();
                e.preventDefault();
            }

            if( currentFocusedElement === lastFocusableEl ){
                mobileSearch.focus();
                e.preventDefault();
            }
        }
    }

    // Set initial focus when menu loaded
    function setInitialFocus(){
        const focusableEls = document.getElementById('mobile-menu-primary').querySelectorAll(`ul > li > a, ul > li > button`);
        const initialFocus = focusableEls[0];

        // Set initial focus on first anchor
        initialFocus.focus();
    } 

    Array.prototype.slice.call(mobileSubmenuToggles, 0).forEach( toggle => {
        toggle.addEventListener('click', switchActiveMenuList);
    });  

    mobileTrigger.addEventListener('click', toggleNavigation);
    mobileTrigger.addEventListener('click', toggleButtonText);
    navigationOverlay.addEventListener('click', closeNavigation); 
    navigationOverlay.addEventListener('click', toggleButtonText); 
})();