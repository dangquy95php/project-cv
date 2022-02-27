const usersSchema = new mongoose.Schema({
    email: {
        type: String,
        required: true,
        unique: true,
        max: 100,
        trim: true
    },
    role: {
        type: String,
        enum: ['admin', 'user'],
        default: 'user'
    },
    password: {
        type: String,
        required: true,
        trim: true,
        minlength: 6
    },
    active_code: {
        type: String,
        trim: true,
        minlength: 20,
    },
    active: {
        type: Boolean,
        trim: true,
        minlength: 20,
        default: false
    },
    created_at: {
        type: Date,
        default: Date,
    },
    updated_at: {
        type: Date,
        default: Date,
    }
});

module.exports = mongoose.model('Users', usersSchema);