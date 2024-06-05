<template>
    <DefaultField
        :field="field"
        :errors="errors"
        :show-help-text="showHelpText"
        :full-width-content="fullWidthContent"
    >
        <template #field>
            <Editor
                :api-key="field.api_key"
                :disabled="field.readonly"
                :init="{
                    ...field.init,
                    // List of plugins to load.
                    plugins: field.plugins.join(' '),
                    // Image upload configuration.
                    automatic_uploads: true,
                    image_uploadtab: true,
                    images_upload_credentials: true,
                    images_upload_url: '/nova-vendor/jacobfitzp/nova-tinymce/images'
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
        }
    }
}
</script>
