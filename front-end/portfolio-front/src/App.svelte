<script>
  import { Router, Link, Route } from "svelte-routing";
  import Comments from './lib/Comments.svelte'
  import viteLogo from '/vite.svg'
  import Home from './lib/Home.svelte'
  import NotFounded from './lib/NotFounded.svelte'

  export let url = ''
</script>

<Router {url}>
  <div>
    <Route path="/comments" component={Comments} />
    <Route path="/" component={Home}></Route>
    <Route path="/*" component={NotFounded}></Route>
  </div>
</Router>

<style>
 
</style>
