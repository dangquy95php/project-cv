const pixelDiffSchema = new mongoose.Schema({
    data: {
        type: String,
        required: true,
        trim: true
    },
    url: {
        type: String,
        required: true,
    },
    width: {
        type: String,
        trim: true,
        required: true,
    },
    design: {
        type: String,
        default: ''
    },
    user_id: {
        required: true,
        trim: true,
        type: mongoose.Schema.Types.ObjectId,
        ref: 'Users'
    },
    success: {
        type: Boolean,
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

module.exports = mongoose.model('PixelDiff', pixelDiffSchema);