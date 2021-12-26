import urllib.request
import http.cookiejar
import json

opener = urllib.request.build_opener(
        urllib.request.HTTPCookieProcessor(http.cookiejar.CookieJar())
)

auth_url = 'http://localhost:8000/api/authentication'

auth_data = {
    'data': {
        'attributes': {
            'email': 'admin@mail.com',
            'password' : 'p@ssw0rd'
        }
    }
}

opener.addheaders = [
    ('User-Agent', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.76 Safari/537.36'),
    ('Content-Type', 'application/json')
]

data = json.dumps(auth_data).encode()

with opener.open(auth_url, data) as res:
    print(res.getheaders())
    print(json.dumps(res.read().decode('utf8')))


