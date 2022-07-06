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

const createMemo = document.getElementById('create_memo');
createMemo.addEventListener('click', (e) => {
    switch (e.target.name) {
        case 'insert':
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
