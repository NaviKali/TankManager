<script setup lang="ts">
import { RouterLink, RouterView } from "vue-router";

const handleNodeClick = (data: any) => {
  if (data.href != undefined) {
    location.href = data.href;
  }
};

const data = [
  {
    label: "首页",
    href: "/",
  },
  {
    label: "目录说明",
    href: "/catalogue",
  },
  {
    label: "控制层",
    children: [
      {
        label: "第一个接口",
        href: "firstinterface",
      },
      {
        label: "自动回调接口",
        href: "autocallinterface",
      },
    ],
  },
];
</script>

<template>
  <div class="common-layout">
    <el-container>
      <el-container>
        <el-aside width="200px">
          <h2>菜单</h2>
          <el-tree
            style="max-width: 600px"
            :data="data"
            @node-click="handleNodeClick"
        /></el-aside>
        <el-main> <RouterView /> </el-main>
      </el-container>
    </el-container>
  </div>
</template>

<style scoped>
</style>
