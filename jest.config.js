module.exports = {
    "moduleFileExtensions": [
        "ts",
        "js",
        "json",
        "vue"
    ],
    "transform": {
        "^.+\\.js$": "babel-jest",
        "^.+\\.vue$": "vue-jest",
        "^.+\\.tsx?$": "ts-jest"
    },
    "globals": {
        "ts-jest": {
            "tsconfig": "<rootDir>/tsconfig.json"
        }
    },
    "testMatch": [
        "<rootDir>/resources/ts/admin-area/__tests__/*.ts",
        "<rootDir>/resources/ts/admin-area/__tests__/**/*.ts",
    ],
    "moduleNameMapper": {
        "a-ts@/(.*)": "<rootDir>/resources/ts/admin-area/$1",
        "a-cmp@/(.*)": "<rootDir>/resources/ts/admin-area/components/$1",
    }
}
