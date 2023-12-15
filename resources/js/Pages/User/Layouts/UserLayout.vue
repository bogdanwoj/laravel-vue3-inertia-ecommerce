<template>


<!--        Header-->
    <Header> </Header>
<!--    end header-->

<!--    hero section -->
    <Hero> </Hero>
<!--    end hero section-->

<!--    main content-->
    <slot />
<!--    end main content-->

<!--    footer-->
    <Footer> </Footer>
<!--    end footer-->

</template>

<script setup>
    import { onMounted } from 'vue'
    import { initFlowbite } from 'flowbite'

    import Header from '../Layouts/Header.vue';
    import Hero from '../Layouts/Hero.vue';
    import Footer from '../Layouts/Footer.vue';
</script>
