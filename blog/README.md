## Technical spec

- Store password encrypted with sha1
- Store data in json format

```
[{
    "title": "Title of the post",
    "date": Date,
    "user": "Username",
    "content": "Content of the post",
    "responses" : [
        {
            "title": "Title of the response",
            "date": Date,
            "user": "Username",
            "content": "Content of the response",
            "responses": [...]
        }
    ]
}]

```