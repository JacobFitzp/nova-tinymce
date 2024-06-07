<template>
    <DefaultField
        :field="field"
        :errors="errors"
        :show-help-text="showHelpText"
        :full-width-content="fullWidthContent"
    >
        <template #field>
            <Editor
                :api-key="field.options.api_key"
                :disabled="field.readonly"
                :placeholder="field.name"
                :toolbar="field.options.toolbar"
                :init="{
                    ...field.options.init,
                    // List of plugins to load.
                    plugins: field.options.plugins.join(' '),
                    // Image upload configuration.
                    automatic_uploads: true,
                    image_uploadtab: true,
                    images_upload_credentials: true,
                    images_upload_url: field.options.storage_endpoint
                }"
                v-model="value"
            />
        </template>
    </DefaultField>
</template>

<script>
import Editor from '@tinymce/tinymce-vue'
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    components: { Editor },

    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    created () {
        this.setEditorTheme()
    },

    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
            this.value = this.field.value || ''
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            formData.append(this.fieldAttribute, this.value || '')
        },

        /**
         * Set the theme for the editor based on the Nova theme.
         */
        setEditorTheme () {
            const selectedNovaTheme = localStorage.novaTheme

            if (typeof selectedNovaTheme !== 'undefined') {
                if (selectedNovaTheme === 'system') {
                    this.setSystemTheme()
                } else if (selectedNovaTheme === 'dark') {
                    this.field.options.init.skin = 'oxide-dark'
                    this.field.options.init.content_css = 'dark'
                } else {
                    this.field.options.init.skin = 'oxide'
                    this.field.options.init.content_css = 'default'
                }
            } else {
                this.setSystemTheme()
            }
        },

        /**
         * Set the theme for the editor based on the system theme.
         */
        setSystemTheme () {
            this.field.options.init.skin =
                window.matchMedia('(prefers-color-scheme: dark)').matches ||
                document.querySelector('html').classList.contains('dark')
                    ? 'oxide-dark'
                    : 'oxide'
            this.field.options.init.content_css =
                window.matchMedia('(prefers-color-scheme: dark)').matches ||
                document.querySelector('html').classList.contains('dark')
                    ? 'dark'
                    : 'default'
        },
    }
}
</script>
