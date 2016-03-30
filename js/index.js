var repoList = document.getElementById("repos"),
    repoTpl = document.getElementById("repo-tpl").text;

fetch("https://api.github.com/search/repositories?q=user:shvelo&sort=stars").then(function(response){
  return response.json();
}).then(function(result) {
  return result.items;
}).then(function(repos) {
  repos.forEach(function(repo){
    var repoElem = document.createElement('a');
    repoElem.className = "repo";
    repoElem.href = repo.html_url;
    repoElem.target = "_blank";
    repoElem.innerHTML = TemplateEngine(repoTpl, repo);
    repoList.appendChild(repoElem);
  });
});
