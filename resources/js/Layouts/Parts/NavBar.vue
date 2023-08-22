<script>
import { Link as ILink } from '@inertiajs/vue3';
import {
  HomeIcon as HomeIconFill,
  CreditCardIcon as CreditCardIconFill,
  HeartIcon as HeartIconFill,
  UserGroupIcon as UserGroupIconFill,
  BuildingOffice2Icon as BuildingOffice2IconFill,
  ArrowDownCircleIcon as ArrowDownCircleIconFill,
  GlobeAltIcon as GlobeAltIconFill,
  WrenchIcon as WrenchIconFill,
  TagIcon as TagIconFill
} from '@heroicons/vue/24/solid';

import {
  HomeIcon as HomeIconOutline,
  CreditCardIcon as CreditCardIconOutline,
  HeartIcon as HeartIconOutline,
  UserGroupIcon as UserGroupIconOutline,
  BuildingOffice2Icon as BuildingOffice2IconOutline,
  ArrowDownCircleIcon as ArrowDownCircleIconOutline,
  GlobeAltIcon as GlobeAltOutline,
  WrenchIcon as WrenchIconOutline,
  TagIcon as TagIconOutline
} from '@heroicons/vue/24/outline';

export default {
  props: {
    icon_style: String,
    row_style: String,
    title: String,
  },
  data() {
    return {
      text_style: 'text-white text-center capitalize',
      admin_user: 'wink_admin',
    };
  },
  components: {
    TagIconOutline,
    TagIconFill,
    WrenchIconOutline,
    ArrowDownCircleIconOutline,
    GlobeAltOutline,
    BuildingOffice2IconOutline,
    HeartIconOutline,
    UserGroupIconOutline,
    HomeIconOutline,
    CreditCardIconOutline,
    WrenchIconFill,
    GlobeAltIconFill,
    ArrowDownCircleIconFill,
    BuildingOffice2IconFill,
    UserGroupIconFill,
    CreditCardIconFill,
    HeartIconFill,
    HomeIconFill,
    ILink,
  },
};
</script>

<template>
  <ILink :href="route('profile.show')" :class="row_style"  >
    <WrenchIconFill
      v-if="title === 'profile'"
      :class="icon_style"
    />
    <WrenchIconOutline
      v-if="title !== 'profile'"
      :class="icon_style"
    />
    <p :class="text_style"> Account </p>
  </ILink>

  <ILink
    :href="route('dashboard.users')"
    :class="row_style"
  >
    <UserGroupIconFill
      v-if="title === 'users'"
      :class="icon_style"
    />
    <UserGroupIconOutline
      v-if="title !== 'users'"
      :class="icon_style"
    />
    <p :class="text_style"> Users </p>
  </ILink>

  <ILink
    :href="route('dashboard.api')"
    :class="row_style"
  >
    <ArrowDownCircleIconFill
      v-if="title === 'API'"
      :class="icon_style"
    />
    <ArrowDownCircleIconOutline
      v-if="title !== 'API'"
      :class="icon_style"
    />
    <p :class="text_style"> API </p>
  </ILink>
  <ILink href="/dashboard/referred/" :class="row_style"  >
    <TagIconFill
      v-if="title === 'dashboard'"
      :class="icon_style"
    />
    <TagIconOutline
      v-if="title !== 'dashboard'"
      :class="icon_style"
    />
    <p :class="text_style"> Referred Friends </p>
  </ILink>
  <ILink href="/dashboard/" :class="row_style"  >
    <HomeIconFill
      v-if="title === 'dashboard'"
      :class="icon_style"
    />
    <HomeIconOutline
      v-if="title !== 'dashboard'"
      :class="icon_style"
    />
    <p :class="text_style"> Dashboard </p>
  </ILink>
  
</template>
