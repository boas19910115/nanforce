const PIXNET = window.pixnet

const WP_API_ROOT = 'wp-json/wp/v2'
const WP_AUTH_HEADER_NAME = 'Authorization'
const WP_CLIENT_ID = 'nanwu'
const WP_CLIENT_SECRET = 'S0a7YfP$@(@d9dBQQ1'

const USERNAME = 'dorkas3000'
const LAST_HREF_KEY = 'drdorkas-blog-lastHref'
const CONSUMER_KEY = '1e547b8651056884c27da3b5f635f831'
const CONSUMER_SECRET = 'a7982792fec1e47fa49abc18fc789ef6'
const CALLBACK_URL = 'https://drdorkas.nanforce.com/wp-admin'

PIXNET.init({
  consumerKey: CONSUMER_KEY,
  consumerSecret: CONSUMER_SECRET,
  callbackUrl: CALLBACK_URL,
})

const log = (...args) => console.log(...args)

$.ajaxSetup({
  beforeSend: function (xhr, options) {
    options.url = `/${WP_API_ROOT}/${options.url}`
  },
  headers: {
    [WP_AUTH_HEADER_NAME]: `Basic ${btoa(
      `${WP_CLIENT_ID}:${WP_CLIENT_SECRET}`
    )}`,
    Accept: '*/*',
  },
})

const pixnetAuthorized = () => {
  return new Promise((resolve, reject) => {
    PIXNET.login(resolve)
  })
}

const getWpPostById = (id) =>
  new Promise((resolve, reject) =>
    $.ajax({
      dataType: 'json',
      url: `posts/${id}`,
      success(res) {
        resolve(res)
      },
    })
  )
const updateWpPostById = (id, data) =>
  new Promise((resolve, reject) =>
    $.ajax({
      method: 'post',
      dataType: 'json',
      url: `posts/${id}`,
      contentType: 'application/json',
      data: JSON.stringify(data),
      success(res) {
        resolve(res)
      },
    })
  )

const getCategories = () =>
  new Promise((resolve, reject) => pixnet.blog.getCategories(resolve, USERNAME))

const postAricle = (title, body, categoryId, siteCategoryId) =>
  new Promise((resolve, reject) => {
    PIXNET.blog.createArticle(
      (res) => {
        resolve(res)
      },
      title,
      body,
      {
        status: 4,
        category_id: Number(categoryId),
        site_category_id: Number(siteCategoryId),
      }
    )
  })

const initialize = async () => {
  await pixnetAuthorized()
}

initialize().then(async () => {
  const tableClass = 'table.table-view-list.posts'
  /**
   * Create Selection for Categories
   */
  const { categories } = await getCategories()
  const categorySelect = document.createElement('select')
  const categoryOptions = categories.map((cat) => {
    const {
      id: categoryId,
      site_category_id: siteCategoryId,
      name: categoryName,
    } = cat
    const option = document.createElement('option')
    option.innerHTML = categoryName
    option.value = JSON.stringify({
      categoryId,
      siteCategoryId,
    })
    return option
  })
  categorySelect.append(...categoryOptions)

  /**
   * Create talbe's new head for pixnet
   */
  const pixnetTextHead = document.createElement('th')
  pixnetTextHead.innerHTML = 'PIXNET'
  $(`${tableClass}>thead>tr`).append(pixnetTextHead)

  $(`${tableClass}>tbody>tr`).each(function () {
    const currentRowJQ = $(this)
    const [_, currentId] = currentRowJQ.get(0).id.split('-')
    const lastTd = document.createElement('td')

    /**
     * Post current artice to pixnet
     */
    const pixnetPostButton = document.createElement('button')
    pixnetPostButton.innerHTML = 'POST'
    const clonedSelection = categorySelect.cloneNode(true)
    pixnetPostButton.addEventListener('click', async (event) => {
      event.preventDefault()
      event.stopPropagation()
      event.cancelBubble = true
      const data = await getWpPostById(currentId)
      const {
        title: { rendered: title },
        content: { rendered: body },
        id: wpPostId,
        meta: wpPostMeta,
      } = data
      const { categoryId, siteCategoryId } = JSON.parse(clonedSelection.value)
      const response = await postAricle(
        `${title}[弟弟在測試]`,
        body,
        categoryId,
        siteCategoryId
      )
      if (response) {
        const {
          article: { id: pixnetArticleId },
        } = response
        await updateWpPostById(wpPostId, {
          meta: { ...wpPostMeta, pixnetArticleId },
        })
      }
    })

    lastTd.append(pixnetPostButton)
    lastTd.append(clonedSelection)
    currentRowJQ.append(lastTd)
  })
})
