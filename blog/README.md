## Technical specifications

- Store password encrypted with sha1
- Store data in Json format (mongodb)

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

### Title structure

- First post
    - First post - responseNv1
    - First post - responseNv1:2
        - First post - responseNv2
            - First post - responseNv3
            
Limit to 3 levels.


## Implemented features

### Users

- Signup, check if username already exists
- Login, display form username/password errors
- Logout

### Posts

- Post a new article, custome username if not logged in (using $_SESSION)
- Answer to article