function makeTemplate(data) {
    return `
    <div class="memo-content">
        <input value="${data.title}">
        <input value="${data.content}">
        <button class="update-button" value="${data.id}">編集</button>
        <button class="delete-button" onclick="memoDelete(${data.id})">削除</button>
    </div>
    `;
}

function makeTemplates(contents) {
    const listArea = document.getElementById('list_area');
    let templates = '';
    for (let i = 0; i < contents.length; i++) {
        let template = makeTemplate(contents[i]);
        templates += template;
    }
    listArea.insertAdjacentHTML('afterbegin', templates);
}

{
    const REQUEST_URL = "http://localhost:80/kobakeep_api/api/";
    const data = {list: 'list'};

    fetch(REQUEST_URL, {
        method: "POST",
        body: JSON.stringify(data),
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'action': 'list',
            'model': 'memo'
        }
    })
    .then (response => {
        return response.json();
    })
    .then (data => {
        // console.log(data);
        makeTemplates(data);
        memoUpdate();
    })
    .catch (e => {
        console.log(e);
    })
}



const createMemo = document.getElementById('create_memo');
createMemo.addEventListener('click', (e) => {
    switch (e.target.name) {
        case 'insert':
            console.log('insert!');
            insert_memo();
            break;
        case 'close':
            createMemo.classList.remove('create-memo-open');
            break;
        default:
            createMemo.classList.add('create-memo-open');
            break;
    }
});

createMemo.addEventListener('oninput', (e) => {

}); 

function memoUpdate() {
    document.getElementsByClassName('update-button')[0].addEventListener('click', (e)=> {
        const id = e.target.value;
        const title = e.target.parentElement.children[0].value;
        const content = e.target.parentElement.children[1].value;
        data = {
            id: id,
            title: title,
            content: content
        };
        
        fetch(REQUEST_URL, {
            method: "POST",
            body: JSON.stringify(data),
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'action': 'update',
                'model': 'memo'
            }
        })
        .then (response => {
            return response.json();
        })
        .then (data => {
            console.log(data);
            location.reload();
        })
        .catch (e => {
            console.log(e);
        })
    });
}