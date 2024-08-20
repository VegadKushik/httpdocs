const {__} = wp.i18n;
const {addFilter} = wp.hooks;

addFilter(
    "blocks.registerBlockType",
    "core/quote",
    extendWithRegisterBlockType
);

function extendWithRegisterBlockType(settings, name) {

    // Check for block type.
    if ("core/quote" === name) {

        if (!settings.styles[2]) {
            settings.styles.push({
                name: 'alternative',
                label: 'Alternative'
            });
        }

        // settings.attributes.value.multiline = '';
    }

    if ("core/image" === name) {

        if (!settings.styles[2]) {
            settings.styles.push({
                name: 'with-overlay',
                label: 'With overlay'
            });
        }

        // settings.attributes.value.multiline = '';
    }

    return settings;
}
